<div>
    <a href="{{ route('hobby.create') }}" class="bg-blue-500 text-white px-4 py-2">Tambah Hobby</a>

    <table class="w-full mt-4 border-collapse">
        <thead>
            <tr>
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hobbies as $hobby)
                <tr>
                    <td class="border px-4 py-2">{{ $hobby->hobby }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('hobby.show', $hobby->id) }}"
                            class="bg-green-500 text-white px-2 py-1">Lihat</a>
                        <a href="{{ route('hobby.edit', $hobby->id) }}"
                            class="bg-yellow-500 text-white px-2 py-1">Edit</a>
                        <button onclick="confirmDelete({{ $hobby->id }})"
                            class="bg-red-500 text-white px-2 py-1">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


<script>
    function confirmDelete(id) {
        if (confirm('Apakah anda yakin ingin menghapus data ini?')) {
            @this.call('delete', id);
        }
    }
</script>
