<header class="w-full px-6 py-4 mb-5 border-b-2 border-[#d1d5db]">
    <div class="flex justify-between items-center w-full">
        <div class="ml-3">
            <h1><a href="{{route('app.home')}}">Make PC</a></h1>
        </div>
        <nav>
            <div class="flex justify-center items-center space-x-5">
                <img src="{{ asset(str_starts_with($user->icon,'images') ? $user->icon : 'storage/' . $user->icon ) }}" alt="ユーザのアイコン。"
                class="w-20 h-20 rounded-full object-cover border-2 border-gray-300 mr-3">
                <h2 class="text-[#1e1e1f] mr-3">{{ $user->name }}さん</h2>
                <p><a href="{{ route('app.lists') }}" class="button">mylistへ</a></p>
                <form action="{{ route('auth.logout' )}}" method="post">
                    @csrf
                    <button type="submit" class="button">ログアウト</button>
                </form>
            </div>
        </nav>
    </div>
</header>
