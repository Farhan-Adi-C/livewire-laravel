<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Xendit\Configuration;
use Illuminate\Support\Str;
use Xendit\Invoice\Invoice;
use Illuminate\Http\Request;
use Xendit\Invoice\InvoiceApi;
use Illuminate\Support\Facades\Log;
use Xendit\Invoice\CreateInvoiceRequest;

class PaymentController extends Controller
{

    public function index(){
        return view('coba');
    }
//     public function __construct()
//    {
//        Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));
//    }

//    public function createInvoice(Request $request)
//    {
//        try {
//            $order = new Payment;
//            $order->user_id = $request->input('user_id');
//            $order->external_id = (string) Str::uuid();
//            $order->amount = $request->input('amount');
//            $order->payer_email = $request->input('payer_email');
//            $order->description = $request->input('description');
//            $createInvoice = new CreateInvoiceRequest([
//                'external_id' => $order->external_id,
//                'amount' => $request->input('amount'),
//                'payer_email' => $request->input('payer_email'),
//                'description' => $request->input('description'),
//                'invoice_duration' => 172800,
//            ]);


//          $apiInstance = new InvoiceApi();
//          $generateInvoice = $apiInstance->createInvoice($createInvoice);
//          $order->checkout_link = $generateInvoice['invoice_url'];
//          $order->save();
//          return response()->json([
//              'message' => 'Invoice created',
//              'checkout_link' => $order->checkout_link,
//          ]);


//        } catch (\Throwable $th) {
//            throw $th;
//        }
//    }

//    public function handleWebhook(Request $request)
//    {
//        $data = $request->all();
//        $external_id = $data['external_id'];
//        $status = strtolower($data['status']);
//        $payment_method = $data['payment_method'];


//        $order = Payment::where('external_id', $external_id)->first();
//        $order->status = $status;
//        $order->payment_method = $payment_method;
//        $order->save();


//        return response()->json([
//            'message' => 'Webhook received',
//            'status' => $status,
//            'payment_method' => $payment_method,
//        ]);
//    }

public function __construct()
{
    Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));
}

public function createInvoice(Request $request)
{
    try {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'amount' => 'required|numeric|min:1000', // Minimal Rp1000
        ]);

        Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));

        $external_id = 'invoice-' . time();

        $params = new CreateInvoiceRequest([
            'external_id' => $external_id,
            'payer_email' => $request->email,
            'description' => 'Pembayaran Produk',
            'amount' => $request->amount,
            'invoice_duration' => 172800, // 2 hari
        ]);

        $apiInstance = new InvoiceApi();
        $invoice = $apiInstance->createInvoice($params);

        if (!$invoice) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal membuat invoice. Coba lagi nanti.'
            ], 500);
        }

        // Simpan ke database
        try {
            Payment::create([
                'external_id' => $external_id,
                'payer_email' => $request->email,
                'amount' => $request->amount,
                'status' => 'PENDING',
                'invoice_url' => $invoice['invoice_url'],
            ]);
        } catch (\Exception $dbException) {
            return response()->json([
                'success' => false,
                'message' => 'Invoice berhasil dibuat, tetapi gagal menyimpan ke database.',
                'invoice_url' => $invoice['invoice_url'],
                'error' => $dbException->getMessage(),
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Invoice berhasil dibuat.',
            'invoice' => $invoice
        ]);
    } catch (\Illuminate\Validation\ValidationException $validationException) {
        return response()->json([
            'success' => false,
            'message' => 'Validasi gagal. Periksa kembali input Anda.',
            'errors' => $validationException->errors(),
        ], 422);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan saat membuat invoice.',
            'error' => $e->getMessage()
        ], 500);
    }
}




public function handleCallback(Request $request)
{
    Log::info('Xendit Callback: ', $request->all());

    $data = $request->all();
    $external_id = $data['external_id'];
    $status = strtolower($data['status']);
    $payment_method = $data['payment_method'] ?? null;

    $payment = Payment::where('external_id', $external_id)->first();

    if ($payment) {
        $payment->update([
            'status' => $status,
            'payment_method' => $payment_method,
        ]);
    }

    return response()->json(['message' => 'Callback received']);
}

}  