<h3 class="font-bold text-xl mb-4">Following</h3>

<ul>
    @foreach (auth()->user()->follows as $follower)

    <li class="mb-4">
        <div class="flex items-center text-sm">
            <img src="{{$follower->avator}}" alt="your avator" class="rounded-full mr-2">
            {{$follower->name}}
        </div>
    </li>
    @endforeach
</ul>