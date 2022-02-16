<x-main>
    <x-navbar/>
        @if(isset($user_id))
            <livewire:posts :user_id="$user_id">
        @else
            <livewire:posts>
        @endif
</x-main>

