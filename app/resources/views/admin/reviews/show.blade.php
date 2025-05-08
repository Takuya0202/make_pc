<x-layouts.admin title="レビュー詳細">
    <div class="flex items-center justify-center w-full h-full">
        <div class=" w-[60%] max-w-[600px] p-6 bg-white">
            {{-- レビューユーザーについて --}}
            <div>
                <h2>ユーザ情報</h2>
                <img src="{{ asset(str_starts_with($review->user->icon,'images') ? $review->user->icon : 'storage/' . $review->user->icon ) }}"
                class="w-12 h-12 rounded-full object-cover border-2 border-gray-300">
                <p>{{$review->user->name}}</p>
                <p>レビュー投稿日<span>{{$review->user->created_at->format('Y年n月j日 H:i')}}</span></p>
            </div>
            {{-- レビューパーツについて --}}
            <div>
                <h2>パーツ情報</h2>
                <img src="{{asset(str_starts_with($review->part->image , 'images') ? $review->part->image : 'storage/' . $review->part->image)}}"
                class="w-20 h-20 object-fill">
                <p>{{$review->part->name}}</p>
                <p>カテゴリー<span>{{$review->part->category->name}}</span></p>
                <p>メーカー<span>{{$review->part->maker->name}}</span></p>
            </div>
            {{-- レビュー内容 --}}
            <div>
                <h2>レビュー内容</h2>
                <textarea readonly cols="30" rows="10">{{$review->body}}</textarea>
            </div>
        </div>
    </div>
</x-layouts.admin>
