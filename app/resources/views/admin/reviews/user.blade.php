<x-layouts.admin title="{{$user->name}}さんのレビュー">
    <div class="bg-white p-6 rounded-2xl shadow-md m-5">
        <div class="flex items-center m-6 space-x-8">
            <p><img src="{{asset(str_starts_with($user->icon , 'images') ? $user->icon : 'storage/' . $user->icon)}}"
                class="w-40 h-40 "></p>
            <h2 class="text-xl font-bold">{{$user->name}}さんのレビュー</h2>
            <h2 class="text-xl font-bold"><span class="mx-2 text-2xl text-orange-500">{{$totalReviews}}</span>件のレビュー</h2>
        </div>
        <ul class="space-y-3 my-2">
            @foreach ($reviews as $review)
                <li  class="flex items-center justify-start space-x-8 border-b-2 border-[#d1d5db] pb-2">
                    {{-- レビューひょうか --}}
                    <div class="flex space-x-1 w-24">
                        @for ($i = 1; $i <= $review->rating; $i++)
                            <span class="text-yellow-400">★</span>
                        @endfor
                    </div>
                    {{-- レビューは最大200文字まで表示する --}}
                    <p class="text-xl font-semibold w-[70%]"><a href="{{route('admin.reviews.show' , ['review_id' => $review->id])}}">{{$review->body}}</a></p>
                    {{-- レビューしたパーツのリンク,削除ボタン --}}
                    <div class="flex flex-1 justify-end items-center">
                        <p class="button2 bg-red-600 hover:bg-red-700 mr-10"><a href="">削除</a></p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</x-layouts.admin>
