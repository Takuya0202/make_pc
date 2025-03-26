<header class="w-full bg-gray-500 px-6 py-4 mb-5">
    <div class="flex justify-between items-center w-full">
        <div class="ml-3">
            <h1>Make PC</h1>
        </div>
        <div class="flex justify-center items-center ">
            <img src="{{ asset( 'storage/' . $user->icon) }}" alt="ユーザのアイコン。"
            class="w-20 h-20 rounded-full object-cover border-2 border-gray-300 mr-3">
            <h2 class="text-[#1e1e1f] mr-3">{{ $user->name }}さん</h2>
            <form action="{{route('auth.logout')}}" method="POST" class="mr-3">
                @csrf
                <input type="submit" value="ログアウト" class="p-2 bg-black text-white">
            </form>
        </div>
    </div>
</header>
