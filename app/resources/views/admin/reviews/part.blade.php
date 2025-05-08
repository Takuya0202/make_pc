<x-layouts.admin title="{{$part->user->name}}のレビュー">
    <div class="bg-white p-6 rounded-2xl shadow-md">
        <div class="flex items-center m-4 space-x-8">
            <p><img src="{{asset(str_starts_with($review->part->image , 'images') ? $review->part->image : 'storage/' . $review->part->image)}}"
                class="w-40 h-40 "></p>
            <h2 class="text-xl font-bold m-4">{{$review->part->name}}のレビュー</h2>
        </div>
        <ul class="space-y-3 my-2">
            @foreach ($reviews as $review)
                <li  class="flex items-center justify-start space-x-8 border-b-2 border-[#d1d5db] pb-2">
                    {{-- レビューユーザのアイコン、名前 --}}
                    <p><img src="{{asset(str_starts_with($review->user->icon,'images') ? $review->user->icon : 'storage/' . $review->user->icon)}}"
                        class="w-12 h-12 rounded-full"></p>
                    <p class="font-bold text-xl text-blue-700"><a href="">{{$review->user->name}} さん</a></p>
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
