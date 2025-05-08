<x-layouts.admin title="全てのレビュー">
    <div class="bg-white p-6 rounded-2xl shadow-md">
        <h2 class="text-xl font-bold m-4">全てのレビュー</h2>
        <ul class="space-y-3 my-2">
            @foreach ($reviews as $review)
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
</x-layouts.admin>
