<x-layouts.app title="詳細">
    <x-layouts.header />
    <div class="my-20 mx-auto w-[80%] flex items-center justify-between">
        <div class="w-[30%]">
            <div class="mb-10">
                <img src="{{asset(str_starts_with($part->image,'images') ?  $part->image : 'storage/' . $part->image)}}"
                alt="選択された商品の画像" class="w-[400px] h-[400px] rounded-2xl object-fill p-5 bg-white">
            </div>
            <div class="flex my-5 gap-5 ">
                <p>
                    <a href="{{route('app.home')}}"
                    class="button2">戻る</a>
                </p>
                <p>
                    <a href="{{$part->url}}" target="_blank"
                    class="button2">Amazonの購入ページへ</a>
                </p>
            </div>
        </div>
        <div class="w-[50%] bg-white shadow-2xl p-6 border-2 border-gray-200 rounded-3xl space-y-8">
            <div class="flex justify-between items-center">
                <p class="">商品スペック</p>
                <p class="border-l-2 border-zinc-500 pl-5 w-[80%]">{{$part->detail}}</p>
            </div>
            <div class="my-5 grid grid-cols-2 gap-x-5 gap-y-5 text-lg">
                <p>価格</p>
                <p>{{$part->price}}</p>

                <p>カテゴリー</p>
                <p>{{$part->category->name}}</p>

                <p>メーカー</p>
                <p>{{$part->maker->name}}</p>
            </div>
            {{-- 追加時のメッセージコンポーネント --}}
            <x-infomation />
            {{-- pclist追加のフォーム --}}
            <div class="my-5">
                <form action="{{route('app.list.add')}}" method="post">
                    @csrf
                    {{-- パーツidは隠して送信 --}}
                    <input type="text" name="part_id" value="{{$part->id}}" class="hidden">

                    <label for="list">追加するリスト</label>
                    <select name="pc_list_id" id="list" class="appearance-none p-4 rounded-2xl bg-[#f2f2f2] leading-3">
                        @foreach ($pcLists as $pcList)
                            <option value="{{ $pcList->id }}" class="bg-[#f6f6f6]">{{ $pcList->name }}</option>
                        @endforeach
                    </select>

                    <label for="quantity">数量</label>
                    <input type="number" name="quantity" id="quantity" value="1" min="1" max="99">

                    <button type="submit">リストに追加</button>
            </div>
        </div>
    </div>
    <div class="w-[80%] my-10 mx-auto">
        <div class="my-10 flex items-center space-x-5 ">
            <p>商品レビュー</p>
            <p>レーティング</p>
            <p class="text-3xl font-bold">{{$rating}}</p>
            <p><a href="{{route('app.review',['part_id' => $part->id])}}"
                class="w-20 px-[30px] py-[10px] bg-black text-white font-semibold rounded-xl hover:bg-gray-700">レビューする</a></p>
        </div>
        <div class="my-5">
            @foreach ($reviews as $review)
                <div class="my-5 flex items-center ">
                    <img src="{{asset(str_starts_with($review->user->icon,'images') ? $review->user->icon : 'storage/' . $review->user->icon )}}"
                    alt="レビューしたユーザのアイコン" class="mr-5 w-20 h-20 rounded-full object-cover border-2 border-gray-300 ">
                    <div class="">
                        <div class="flex space-x-1">
                            @for ($i = 1; $i <= $review->rating; $i++)
                                <span class="text-yellow-400">★</span>
                            @endfor
                        </div>
                        <p>{{$review->body}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layouts.app>
