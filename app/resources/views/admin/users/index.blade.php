<x-layouts.admin title="ユーザー一覧">
    <div class="bg-white p-6 rounded-2xl shadow-md m-5">
        <div class="grid grid-cols-4 gap-4 mx-5">
            @foreach ($users as $user)
                <div class="border-b-2 border-r-2 border-[#d1d5db] pr-3 pb-3">
                    <p class="mb-2"><img src="{{asset(str_starts_with($user->icon , 'images') ? $user->icon :'storage/' . $user->icon)}}"
                        class="w-20 h-20 rounded-full"></p>
                    <p class="mb-2">ユーザー名：{{$user->name}}</p>
                    <p class="mb-2 ">メールアドレス：<span class="text-blue-400">{{$user->email}}</span></p>
                    <p class="mb-2">登録日：<span>{{$user->created_at->format('Y年n月j日 H:i')}}</span></p>
                    <p><a href="{{route('admin.users.show' , ['user_id' => $user->id])}}">詳細情報</a></p>
                    <p class="text-blue-700"><a href="{{route('admin.reviews.user' , ['user_id' => $user->id])}}">このユーザーのレビューを見る</a></p>
                </div>
            @endforeach
        </div>
    </div>
</x-layouts.admin>
