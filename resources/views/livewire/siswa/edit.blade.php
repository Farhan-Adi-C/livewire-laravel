<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <form class="bg-white p-6 rounded-2xl shadow-lg w-96" wire:submit.prevent="update">
        
        <h2 class="text-2xl font-semibold text-gray-700 text-center mb-4">Detail Siswa</h2>

        <label class="block text-gray-600 mb-1">Nama</label>
        <input type="text" wire:model="siswa" placeholder="Masukkan Nama" 
            class="w-full px-4 py-2 border rounded-lg mb-4" required>

        <label class="block text-gray-600 mb-1">NISN</label>
        <input type="text" wire:model="nisn" placeholder="Masukkan NISN" 
            class="w-full px-4 py-2 border rounded-lg mb-4" required>

        <label class="block text-gray-600 mb-1">Hobi</label>
        <div class="grid grid-cols-2 gap-2 mb-4">
            @foreach ($hobbiesList as $hobby)
            <label class="flex items-center space-x-2">
                <input type="checkbox" wire:model="hobbies" value="{{ $hobby->id }}" 
                    class="form-checkbox text-blue-500" 
                    {{ in_array($hobby->id, $hobbies) ? 'checked' : '' }}>
                <span class="text-gray-700">{{ $hobby->hobby }}</span>
            </label>
            @endforeach
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg">Submit</button>
    </form>
</div>