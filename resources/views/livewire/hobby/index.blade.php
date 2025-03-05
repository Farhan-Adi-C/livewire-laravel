<div class="max-w-4xl mx-auto mt-6 p-4 bg-white shadow-lg rounded-lg">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold">Daftar Hobi</h2>
        <a href="{{ route('hobby.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
            + Tambah Hobby
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border border-gray-300 rounded-lg">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border px-4 py-2 text-left">Nama</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-300">
                @foreach ($hobbies as $hobby)
                    <tr class="hover:bg-gray-100 transition">
                        <td class="border px-4 py-2">{{ $hobby->hobby }}</td>
                        <td class=" px-4 py-2 flex gap-2 text-center mx-auto justify-center">
                            <a href="{{ route('hobby.show', $hobby->id) }}"
                                class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-md text-sm">
                                Lihat
                            </a>
                            <a href="{{ route('hobby.edit', $hobby->id) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md text-sm">
                                Edit
                            </a>
                            <button onclick="confirmDelete({{ $hobby->id }})"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm">
                                Hapus
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function confirmDelete(id) {
        if (confirm('Apakah anda yakin ingin menghapus data ini?')) {
            @this.call('delete', id);
        }
    }
</script>
