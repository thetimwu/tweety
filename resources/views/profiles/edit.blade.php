<x-app>
    <form method="POST" action="{{$user->path()}}" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="mb-6">
            <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Name
            </label>

            <input type="text" class="border border-gray-400 p-2 w-full" 
                name="name" id="name" value="{{$user->name}}" required>

            @error('name')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                User Name
            </label>

            <input type="text" class="border border-gray-400 p-2 w-full" 
                name="username" id="username" value="{{$user->username}}" required>

            @error('username')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Avatar
            </label>

            <div class="flex">
                <input type="file" class="border border-gray-400 p-2 w-full" 
                    name="avatar" id="avatar">

                    <img src="{{$user->avatar}}" alt="your avatar" width="100px">

                </div>

                @error('avatar')
                    <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror

        </div>

        <div class="mb-6">
            <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Email
            </label>

            <input type="email" class="border border-gray-400 p-2 w-full" 
                name="email" id="email" value="{{$user->email}}" required>

            @error('email')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Password
            </label>

            <input type="password" class="border border-gray-400 p-2 w-full" 
                name="password" id="password" required>

            @error('password')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Password Confirmation
            </label>

            <input type="password" class="border border-gray-400 p-2 w-full" name="password_confirmation" id="password_confirmation" required>

            @error('password_confirmation')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4">Submit</button>
            <a href="{{$user->path()}}" class="hover:underLine">Cancel</a>
        </div>
    </form>

</x-app>