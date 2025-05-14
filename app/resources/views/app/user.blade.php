<x-layouts.app title="{{$user->name}}さんのプロフィール">

    {{-- head --}}
    <x-slot:head>
        <script src="{{asset('js/preview.js')}}"></script>
    </x-slot:head>

    {{-- header --}}
    <x-slot:header>
        <x-layouts.header />
    </x-slot:header>

    {{-- main --}}
    <div class="w-full h-full flex justify-center items-center">
        <form action="{{route('app.user.update' , ['user_id' => $user->id])}}" method="POST" enctype="multipart/form-data" class="bg-white shadow-2xl  p-6 rounded-2xl flex items-center justify-center space-x-10">
            @csrf
            @method('PUT')
            {{-- ユーザーアイコン --}}
            <div>
                <label for="icon" class="cursor-pointer">
                    <img src="{{asset(str_starts_with($user->icon , 'images') ? $user->icon :'storage/' . $user->icon) }}" id="preview"
                    class="w-64 h-64 rounded-full object-cover border-2 border-gray-300">
                </label>
                <input type="file" name="icon" class="file-input hidden" id="icon">
            </div>

            <div>

                {{-- アラートコンポーネント --}}
                <x-alert :$errors />

                {{-- ユーザー名、email --}}
                <div class="mb-3">
                    <h2 class="mb-3 ">ユーザー名</h2>
                    <input type="text" name="name" id="" value="{{old('name' , $user->name)}}"
                    class="block p-3 border-2 border-[#d1d5db] w-96 rounded-md">
                </div>
                <div class="mb-3">
                    <h2 class="mb-3">email</h2>
                    <input type="text" name="email" id="" value="{{old('email' , $user->email)}}"
                    class="block p-3 border-2 border-[#d1d5db] w-96 rounded-md">
                </div>

                {{-- ボタン --}}
                <div class="flex justify-end space-x-5">
                    <p><a href="{{route('app.home')}}" class="button2">戻る</a></p>
                    <button type="submit" class="button2">更新</button>
                </div>

            </div>
        </form>
    </div>

</x-layouts.app>
