<div class="bg-white p-6 rounded-2xl shadow-lg w-96">
    <h2 class="text-2xl font-semibold text-gray-700 text-center mb-4">Detail Siswa</h2>

    <p class="text-gray-600 mb-3"><strong>Nama:</strong> {{ $siswa->name }}</p>

    <p class="text-gray-600"><strong>Phone Numbers:</strong></p>
    <ul class="list-disc pl-5 text-gray-600 mb-12">
        @foreach ($siswa->phone as $phone)
            <li class="flex justify-between items-center py-1">
                <span> - {{ $phone->phone }}</span>
                <div class="flex gap-2">

                    <a href="{{ route('phone.update', ['id' => $phone->id]) }}" 
                        class="px-3 py-1 bg-blue-500 text-white text-sm rounded-lg shadow-md hover:bg-blue-700 transition-all duration-300">
                        Edit
                    </a>
                    <button
                    type="button"
                        class="px-3 py-1 bg-red-500 text-white text-sm rounded-lg shadow-md hover:bg-blue-700 transition-all duration-300"
                        @click="if(confirm('Apakah Anda yakin ingin menghapus siswa ini?')) $wire.delete({{ $phone->id }})">
                        Hapus
                    </button>
                </div>
            </li> 
        @endforeach
    </ul>

    <a href="{{ route('phone.create', ['id' => $siswa->id]) }}" 
       class="block mt-4 text-center px-6 py-2 bg-green-500 text-white rounded-lg shadow-md hover:bg-green-600 transition-all duration-300">
        Add Phone
    </a>
    <a href="{{ route('phone.index') }}" 
       class="block mt-4 text-center px-6 py-2 bg-gray-500 text-white rounded-lg shadow-md hover:bg-gray-700 transition-all duration-300">
        Kembali
    </a>
</div>