<div class="flex flex-col items-center">
    <form wire:submit.prevent="update" class="w-80 p-4 bg-white shadow-md rounded-lg">
        @if (session()->has('message'))
            <div class="bg-green-100 text-green-700 p-2 rounded-lg mb-2">
                {{ session('message') }}
            </div>
        @endif

        <label for="phone" class="block text-gray-700 font-medium mb-2">Nomor Telepon</label>
        <input type="text" wire:model="phone_number"
            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
            placeholder="Masukkan nomor telepon">
        @error('phone_number')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror

        <button type="submit" 
            class="mt-4 w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
            Submit
        </button>
    </form>
</div>
