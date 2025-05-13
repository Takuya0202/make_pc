<x-layouts.admin title="全てのレビュー">

    <div class="bg-white p-6 rounded-2xl shadow-md m-5">

        {{-- レビュー検索 --}}
        <div class="flex items-center space-x-5 m-4">
            <h2 class="text-xl font-bold ">全てのレビュー</h2>

            {{-- ソート --}}
            <form action="{{route('admin.reviews.search')}}" method="get">
                <select name="sort" class="p-3 bg-white border-2 border-[#3e3e3e] rounded-xl" onchange="this.form.submit()">
                    <option value="created_desc" @selected(request('sort') == 'created_desc')>新しい順</option>
                    <option value="rating_desc" @selected(request('sort') == 'rating_desc')>評価の高い順</option>
                    <option value="rating_asc" @selected(request('sort') == 'rating_desc')>評価の低い順</option>
                </select>
            </form>
        </div>

        {{-- レビュー一覧 --}}
        <ul class="space-y-3 my-2">
            @foreach ($reviews as $review)
                <li  class="flex flex-wrap items-center justify-start space-x-8 border-b-2 border-[#d1d5db] pb-2">
                    {{-- レビューユーザのアイコン、名前 --}}
                    <p><img src="{{asset(str_starts_with($review->user->icon,'images') ? $review->user->icon : 'storage/' . $review->user->icon)}}"
                        class="w-12 h-12 rounded-full"></p>
                    <p class="font-bold text-xl text-blue-700"><a href="{{route('admin.reviews.user' , ['user_id' => $review->user->id])}}">{{$review->user->name}} さん</a></p>
                    {{-- レビューひょうか --}}
                    <div class="flex space-x-1 ">
                        @for ($i = 1; $i <= $review->rating; $i++)
                            <span class="text-yellow-400">★</span>
                        @endfor
                    </div>
                    {{-- レビューは最大40文字まで表示する --}}
                    <p class="text-xl font-semibold "><a href="{{route('admin.reviews.show' , ['review_id' => $review->id])}}">{{Str::limit($review->body,40)}}</a></p>
                    {{--削除ボタン --}}
                    <div class="flex flex-1 justify-end items-center ">
                        <p class="button2 bg-red-600 hover:bg-red-700 mr-10"><a href="{{route('admin.reviews.delete' , ['review_id' => $review->id])}}">削除</a></p>
                    </div>
                </li>
            @endforeach
        </ul>

    </div>
</x-layouts.admin>
