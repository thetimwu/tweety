<x-app>
    <div>
        @foreach ($users as $user)
        <a href="{{route('profile', $user->username)}}" class="flex items-center mb-5">
            <img src="{{$user->avatar}}" alt="{{$user->name}}" width="60px" class="mr-4 rounded">
            <div>
                <h4 class="font-bold">{{ '@' . $user->name}}</h4>
            </div>
        </a>
        @endforeach

        {{$users->links()}}
    </div>
</x-app>