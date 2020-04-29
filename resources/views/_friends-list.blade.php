<div class="bg-gray-200 border border-gray-300 rounded-lg py-4 px-6">

    <h3 class="font-bold text-xl mb-4">Following</h3>

    <ul>
        @forelse (auth()->user()->follows as $follower)

        <li class="{{ $loop->last ? '' : 'mb-4'}}">
            <div>
                <a href="{{route('profile', $follower)}}" class="flex items-center text-sm">
                    <img src="{{$follower->avatar}}" 
                    alt="your avatar" 
                    class="rounded-full mr-2"
                    height="40"
                    width="40">
                    {{$follower->name}}
                </a>
            </div>
        </li>
        @empty
            <li>No Friends yet!</li>
        @endforelse
    </ul>

</div>