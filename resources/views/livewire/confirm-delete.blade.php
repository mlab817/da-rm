<x-jet-dialog-modal>
    <x-slot name="title">
        <h2>Confirm Delete</h2>
    </x-slot>
    <x-slot name="content">
        Are you sure you want to delete this report?
    </x-slot>
    <x-slot name="footer">
        <x-jet-secondary-button wire:click="cancelDelete()">Cancel</x-jet-secondary-button>
        <x-jet-danger-button wire:click="delete({{ $id }})">Delete</x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>
