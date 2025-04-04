<x-layouts.app title="詳細">
    <x-layouts.header />
        <div class="my-20 mx-auto w-[80%] flex items-center justify-center">
            <div class="w-[30%]">
                <div class="mb-10">
                    <img src="{{asset(str_starts_with($part->image,'images') ?  $part->image : 'storage/' . $part->image)}}"
                    alt="選択された商品の画像" class="w-[400px] h-[400px] rounded-2xl object-fill p-5 bg-white">
                </div>
                <div class="flex my-5 gap-5 ">
                    <p>
                        <a href="{{route('app.home')}}"
                        class="mr-3 w-20 px-[30px] py-[10px] bg-black text-white font-semibold rounded-xl">戻る</a>
                    </p>
                    <p>
                        <a href="{{$part->url}}"
                        class="w-20 px-[30px] py-[10px] bg-black text-white font-semibold rounded-xl">Amazonの購入ページへ</a>
                    </p>
                </div>
            </div>
            <div class="w-[70%]">
                <div class="flex justify-between items-center">
                    <p class="border-r-2 border-[#1e1e1f] pr-5 ">商品スペック</p>
                    <p class="w-[80%]">{{$part->detail}}</p>
                </div>
                <div class="grid grid-cols-2 gap-x-5 text-lg">
                    <p>価格</p>
                    <p>{{$part->price}}</p>

                    <p>カテゴリー</p>
                    <p>{{$part->category->name}}</p>

                    <p>メーカー</p>
                    <p>{{$part->maker->name}}</p>
                </div>
                <div class="my-10 flex items-center space-x-5 ">
                    <p>商品レビュー</p>
                    <p>レーティング</p>
                    <p class="text-3xl font-bold">{{$rating}}</p>
                    <p><a href="{{route('app.review',['id' => $part->id])}}"
                        class="w-20 px-[30px] py-[10px] bg-black text-white font-semibold rounded-xl">レビューする</a></p>
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
        </div>

    <x-layouts.footer />
</x-layouts.app>
