<div>
    <h2 class="text-xl">Edit Hobby</h2>
    <form wire:submit.prevent="update">
        <input type="text" wire:model="hobby" class="border px-2 py-1">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2">Update</button>
    </form>
</div>
