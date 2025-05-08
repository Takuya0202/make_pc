<x-layouts.admin title="レビュー詳細">
    <div class="flex items-center justify-center w-full h-full">
        <div class="w-[60%] max-w-[600px] p-6 bg-white">
            {{-- レビューユーザーについて --}}
            <div class="border-b-2 border-[#d1d5db] pb-3 mb-3">
                <h2 class="ml-3 mb-3">ユーザ情報</h2>
                <div class="flex items-center mb-3 ml-3">
                    <img src="{{ asset(str_starts_with($review->user->icon,'images') ? $review->user->icon : 'storage/' . $review->user->icon ) }}"
                    class="w-12 h-12 rounded-full object-cover border-2 border-gray-300 mr-3">
                    <p>{{$review->user->name}}</p>
                </div>
                <p class="ml-3">レビュー投稿日<span class="mx-1.5 font-bold">{{$review->user->created_at->format('Y年n月j日 H:i')}}</span></p>
            </div>
            {{-- レビューパーツについて --}}
            <div class="border-b-2 border-[#d1d5db] pb-3 mb-3">
                <h2 class="ml-3 mb-3">パーツ情報</h2>
                <div class="flex items-center mb-3 ml-3">
                    <img src="{{asset(str_starts_with($review->part->image , 'images') ? $review->part->image : 'storage/' . $review->part->image)}}"
                    class="w-20 h-20 object-fill mr-5">
                    <div class="block">
                        <p>{{$review->part->name}}</p>
                        <div class="flex items-center space-x-5">
                            <p>カテゴリー<span class="mx-2 text-blue-700">{{$review->part->category->name}}</span></p>
                            <p>メーカー<span class="mx-2 text-blue-700">{{$review->part->maker->name}}</span></p>
                        </div>
                    </div>
                </div>
                <p class="ml-3 text-blue-700"><a href="{{route('admin.reviews.part' , ['part_id' => $review->part->id])}}">{{$review->part->name}}のレビューを全て見る</a></p>
            </div>
            {{-- レビュー内容 --}}
            <div class="border-b-2 border-[#d1d5db] pb-3 mb-3">
                <h2 class="ml-3 mb-3">レビュー内容</h2>
                <div class="flex space-x-1 ml-3 mb-3">
                    @for ($i = 1; $i <= $review->rating; $i++)
                        <span class="text-yellow-400">★</span>
                    @endfor
                </div>
                {{-- したのプロパティはレビューの改行や余白も再現するためのもの --}}
                <p class="leading-relaxed whitespace-pre-wrap ml-3">{{ $review->body }}</p>
            </div>
            {{-- ボタン類 --}}
            <div class="flex justify-end items-center space-x-5">
                <p class="button2"><a href="{{route('admin.reviews.index')}}">戻る</a></p>
                <p class="button2 bg-red-600 hover:bg-red-700"><a href="{{route('admin.reviews.delete' , ['review_id' => $review->id])}}">削除する</a></p>
            </div>
        </div>
    </div>
</x-layouts.admin>
