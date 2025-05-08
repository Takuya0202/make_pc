<x-layouts.admin title="管理ダッシュボード">
    <div class="p-8 space-y-10">
        {{-- 統計 --}}
        <div class="grid grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-2xl shadow-md">
                <h3 class="text-sm">総パーツ数</h3>
                <p class="text-3xl font-bold text-orange-500">{{ $totalParts }}</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-md">
                <h3 class="text-sm">総ユーザー数</h3>
                <p class="text-3xl font-bold text-orange-500">{{ $totalUsers }}</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-md">
                <h3 class="text-sm">総レビュー数</h3>
                <p class="text-3xl font-bold text-orange-500">{{ $totalReviews }}</p>
            </div>
        </div>
        {{-- パーツ --}}
        <div class="bg-white p-6 rounded-2xl shadow-md">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold mb-4">最近追加されたパーツ</h2>
                <p><a href="{{route('admin.parts')}}" class="button2 mr-5">パーツをすべて見る</a></p>
            </div>
            <ul class="space-y-3 my-2">
                @foreach ($recentParts as $part)
                    <li class="flex items-center justify-start space-x-8 border-b-2 border-[#d1d5db] pb-2">
                        <p><img src="{{asset(str_starts_with($part->image,'images') ? $part->image : 'storage/' . $part->image)}}"
                            class="w-12 h-12 rounded-xl"></p>
                        <p class="font-bold text-xl text-blue-700"><a href="{{route('admin.part' , ['part_id' => $part->id])}}">{{$part->name}}</a></p>
                        <p class="text-[#3e3e3e]">({{$part->maker->name}} - {{$part->category->name}})</p>
                        <div class="flex items-center flex-1 justify-end mr-5 space-x-8">
                            <p><a href="{{route('admin.part.edit' , ['part_id' => $part->id])}}" class="button2">編集</a></p>
                            <p><a href="{{route('admin.part.delete' , ['part_id' => $part->id])}}" class="button2 bg-red-600 hover:bg-red-700">削除</a></p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        {{-- レビュー --}}
        <div class="bg-white p-6 rounded-2xl shadow-md">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold mb-4">最近のレビュー</h2>
                <p><a href="{{route('admin.reviews.index')}}" class="button2 mr-5">レビューをすべて見る</a></p>
            </div>
            <ul class="space-y-3 my-2">
                @foreach ($recentReviews as $review)
                    <li  class="flex items-center justify-start space-x-8 border-b-2 border-[#d1d5db] pb-2">
                        {{-- レビューユーザのアイコン、名前 --}}
                        <p><img src="{{asset(str_starts_with($review->user->icon,'images') ? $review->user->icon : 'storage/' . $review->user->icon)}}"
                            class="w-12 h-12 rounded-full"></p>
                        <p class="font-bold text-xl text-blue-700"><a href="{{route('admin.reviews.user' , ['user_id' => $review->user->id])}}">{{$review->user->name}} さん</a></p>
                        {{-- レビューひょうか --}}
                        <div class="flex space-x-1">
                            @for ($i = 1; $i <= $review->rating; $i++)
                                <span class="text-yellow-400">★</span>
                            @endfor
                        </div>
                        {{-- レビューは最大40文字まで表示する --}}
                        <p class="text-xl font-semibold ">{{Str::limit($review->body,40)}}</p>
                        {{-- レビューしたパーツのリンク,削除ボタン --}}
                        <div class="flex flex-1 justify-end items-center mr-5 space-x-8">
                            <p class="button"><a href="">{{$review->part->name}}のレビューへ</a></p>
                            <p class="button2 bg-red-600 hover:bg-red-700"><a href="">削除</a></p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-layouts.admin>
