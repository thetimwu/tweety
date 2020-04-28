<form method="POST" action="{{route('toggle-following', $user)}}">
    @csrf
    <button type="submit" class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs">
    {{auth()->user()->isFollowing($user) ? 'Unfollow': 'Following'}}
    </button>
</form>