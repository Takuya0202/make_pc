<x-layouts.admin title="ユーザー一覧">

    {{-- ユーザー検索 --}}
    <form action="{{route('admin.users.search')}}" method="get">

        {{-- 名前検索 --}}
        <div class="flex items-center space-x-5">
            <input type="text" name="name" class="p-4" placeholder="名前で検索" value="{{request('name')}}">
            <button type="submit">検索</button>
        </div>

        {{-- 並び替え --}}
        <div>
            <select name="sort"  onchange="this.form.submit()">
                <option value="created_desc" @selected(request('sort') == 'created_desc')>登録が新しい順</option>
                <option value="created_asc" @selected(request('sort') == 'created_asc')>登録が古い順</option>
                <option value="admin" @selected(request('sort') == 'admin')>管理者ユーザーを表示</option>
            </select>
        </div>
    </form>

    {{-- ユーザー情報一覧 --}}
    <div class="bg-white p-6 rounded-2xl shadow-md m-5">
        <div class="grid grid-cols-4 gap-4 mx-5">
            @foreach ($users as $user)
                <div class="border-b-2 border-r-2 border-[#d1d5db] pr-3 pb-3">
                    <p class="mb-2"><img src="{{asset(str_starts_with($user->icon , 'images') ? $user->icon :'storage/' . $user->icon)}}"
                        class="w-20 h-20 rounded-full"></p>
                    <p class="mb-2">ユーザー名：{{$user->name}}</p>
                    <p class="mb-2 ">メールアドレス：<span class="text-blue-400">{{$user->email}}</span></p>
                    <p class="mb-2">登録日：<span>{{$user->created_at->format('Y年n月j日 H:i')}}</span></p>
                    <p class="mb-2">権限：{{$user->is_admin ? "管理者ユーザー" : "一般ユーザー"}}</p>
                    <p class="text-blue-700"><a href="{{route('admin.reviews.user' , ['user_id' => $user->id])}}">このユーザーのレビューを見る</a></p>
                </div>
            @endforeach
        </div>
    </div>

</x-layouts.admin>
