<div>
    <h2 class="text-xl">Tambah Hobby</h2>
    <form wire:submit.prevent="store">
        <input type="text" wire:model="hobby" placeholder="Nama Hobby" class="border px-2 py-1">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2">Simpan</button>
    </form>
</div>

