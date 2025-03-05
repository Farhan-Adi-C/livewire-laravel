<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <form class="bg-white p-6 rounded-2xl shadow-lg w-96"
        x-data="{ phones: [''] }"
        @submit.prevent="@this.set('phones', phones); $wire.store()">
        
        <h2 class="text-2xl font-semibold text-gray-700 text-center mb-4">User Registration</h2>

        <label class="block text-gray-600 mb-1">Name</label>
        <input type="text" wire:model="name" placeholder="Input Your Name" 
            class="w-full px-4 py-2 border rounded-lg mb-4" required>

        <label class="block text-gray-600 mb-1">NISN</label>
        <input type="text" wire:model="nisn" placeholder="Input Your NISN" 
            class="w-full px-4 py-2 border rounded-lg mb-4" required>

        <label class="block text-gray-600 mb-1">Phone Number</label>
        <template x-for="(phone, index) in phones" :key="index">
            <div class="flex items-center space-x-2 mb-2">
                <input type="text" x-model="phones[index]" placeholder="Phone Number"
                    class="w-full px-4 py-2 border rounded-lg">
                <button type="button" @click="phones.splice(index, 1)" x-show="phones.length > 1"
                    class="px-3 py-2 bg-red-500 text-white rounded-lg">&times;</button>
            </div>
        </template>
        
        <button type="button" @click="phones.push('')" 
            class="w-12 bg-green-500 text-white py-2 rounded-lg mb-4"> <span class="text-xl">+</span> </button>

        <label class="block text-gray-600 mb-1">Hobbies</label>
        <div class="grid grid-cols-2 gap-2 mb-4">
            @foreach ($hobbies as $hobby)
            <label class="flex items-center space-x-2">
                <input type="checkbox" wire:model="hobbiess" value="{{ $hobby->id }}" class="form-checkbox text-blue-500">
                <span class="text-gray-700">{{ $hobby->hobby }}</span>
            </label>
            @endforeach
        </div>
        


        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg">Submit</button>
    </form>
</div>
