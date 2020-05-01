<div class="flex p-4 {{$loop->last ? '' : 'border-b border-b-gray-400'}} ">
    <div class="mr-2 flex-shrink-0">
    <a href="{{route('profile', $tweet->user)}}">
        <img src="{{$tweet->user->avatar}}" alt="user" 
            class="rounded-full mr-2"
            width="50"
            height="50">
    </a>
    </div>

    <div>
        <h5 class="font-bold mb-4">
            <a href="{{route('profile', $tweet->user)}}">
                {{$tweet->user->name}}
            </a>
        </h5>

        <p class="text-sm mb-3">
            {{$tweet->body}}
        </p>

        <x-like-buttons :tweet="$tweet" />
    </div>
</div>
