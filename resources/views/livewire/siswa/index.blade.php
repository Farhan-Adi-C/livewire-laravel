<div x-data>
    <h1 class="text-center font-bold text-4xl mb-8">Daftar Siswa</h1>

    <a href="{{ route('siswa.create') }}" class="px-6 py-3 mb-4 block w-44 bg-black text-white font-bold rounded-lg shadow-md hover:bg-gray-800 transition-all duration-300">
        ➕ Create Siswa
    </a>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">No.</th>
                    <th scope="col" class="px-6 py-3">Siswa</th>
                    <th scope="col" class="px-6 py-3">NISN</th>
                    <th scope="col" class="px-6 py-3">Hobbies</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswas as $siswa)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    <td class="px-6 py-4">{{ $loop->index + 1 }}</td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $siswa->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $siswa->nisn->nisn }}
                    </td>
                    <td class="px-6 py-4">
                        <ul>
                            @foreach ($siswa->hobbies as $hobby)
                            <li> - {{ $hobby->hobby }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="px-6 py-4 flex gap-3 items-center object-center origin-center bg-center">
                        <a href="{{ route('siswa.edit', ['id' => $siswa->id]) }}" class="items-center object-center origin-center bg-center block font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <button 
                            type="button" 
                            class="text-red-600 dark:text-red-500 hover:underline"
                            @click="if(confirm('Apakah Anda yakin ingin menghapus siswa ini?')) $wire.delete({{ $siswa->id }})">
                            Hapus
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
