<div class="favorite-list-item">
    @if($user)
        <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
            style="background-image: url('{{ asset("storage/".$user->avatar) }}');">
        </div>
        <p>{{ $user->name }}</p>
    @endif
</div>
