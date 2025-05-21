<header class="w-full px-6 py-4 mb-5 border-b-2 border-[#d1d5db]">
    <div class="flex items-center justify-between w-full">

        <div class="w-1/6 min-w-[120px]">
            <h1><a href="{{route('app.home')}}" class="text-xl font-bold">Make PC</a></h1>
        </div>

        {{-- 検索バー --}}
        <div class="flex-1">
            <form action="{{route('app.home.search')}}" method="get">
                <div class="flex w-full">
                    <select name="category" class="w-[20%] max-w-24 p-2 text-[#3e3e3e] bg-[#ddd] rounded-l-md" id="headerCategory">
                        @foreach ($categories as $category)
                            @if ($loop->first)
                                <option value="all" @selected(request('category') == 'all')>全て</option>
                            @endif
                            <option value="{{$category->id}}" @selected( (string) request('category') === (string) $category->id)>{{$category->name}}</option>
                        @endforeach
                    </select>
                    <input type="text" name="name" placeholder="キーワードを入力" value="{{request('name') ?? ''}}" id="headerName"
                        class="w-full pl-3 text-[#000] bg-white border-2 border-[#d1d5db]">
                    <button type="submit" class="w-[20%] max-w-24 ml-1 button" id="headerButton">検索</button>
                    {{-- homeからの価格設定を取得 --}}
                    <input type="hidden" name="lowPrice" value="" id="headerLowPrice">
                    <input type="hidden" name="highPrice" value="" id="headerHighPrice">
                </div>
            </form>
        </div>

        {{-- ナビ --}}
        <nav class="w-1/3 min-w-[240px]">
            {{-- ログイン済みの人 --}}
            @if ($user)
                <div class="flex items-center justify-end space-x-3">
                    <img src="{{ asset(str_starts_with($user->icon,'images') ? $user->icon : 'storage/' . $user->icon ) }}"
                        alt="ユーザのアイコン。" class="w-12 h-12 rounded-full object-cover border-2 border-gray-300">
                    <p><a href="{{route('app.user.show')}}" class="text-xl font-semibold text-blue-700">{{$user->name}} さん</a></p>
                    <p><a href="{{ route('app.lists') }}" class="button">mylistへ</a></p>
                    <form action="{{ route('auth.logout') }}" method="post">
                        @csrf
                        <button type="submit" class="button">ログアウト</button>
                    </form>
                </div>
            {{-- 未ログイン --}}
            @else
                <div class="flex items-center justify-end ">
                    <p class="button"><a href="{{route('auth.login')}}">ログイン</a></p>
                </div>
            @endif
        </nav>

    </div>
</header>
