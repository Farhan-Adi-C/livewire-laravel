<div class="flex flex-col items-center">
    <form wire:submit.prevent="store" class="w-80 p-4 bg-white shadow-md rounded-lg">
       

        <label for="phone" class="block text-gray-700 font-medium mb-2">Nomor Telepon</label>
        <input type="text" wire:model="phone"
            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
            placeholder="Masukkan nomor telepon">
      

        <button type="submit" 
            class="mt-4 w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
            Submit
        </button>
    </form>
</div>
