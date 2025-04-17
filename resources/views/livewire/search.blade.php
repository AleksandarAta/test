<div x-data = "{focused_search: $wire.entangle('focused_search').live}">
    <input type="search" wire:model.live = "search" @click = "focused_search = true" @click.away = "focused_search = false">
    <div class="{{ $modal_state }}">
        @foreach ($query as $query )
        
         <a href={{ route('users.show', $query->id) }}>{{$query->name}}</a>
        @endforeach
    </div>
</div>