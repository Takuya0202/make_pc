<x-layouts.app title="詳細">
    <x-layouts.header />
    <link rel="stylesheet" href="{{asset('css/spinNumber.css')}}">
    <script src="{{asset('js/spinNumber.js')}}"></script>
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
            <div class="my-3 text-2xl font-bold text-[#3e3e3e] flex items-center justify-start">
                <h2>{{$part->name}}</h2>
            </div>
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
                <form action="{{route('app.list.add')}}" method="post" data-submit="false" class="spinForm">
                    @csrf
                    <div class="flex items-center justify-start space-x-5 mb-5">
                        {{-- パーツidは隠して送信 --}}
                        <input type="text" name="part_id" value="{{$part->id}}" class="hidden">
                        <div class="w-[40%]">
                            <label class="mb-3">追加するリスト</label><br>
                            <select name="pc_list_id" id="list" class="appearance-none p-4 rounded-2xl bg-[#f2f2f2] leading-3">
                                @foreach ($pcLists as $pcList)
                                    <option value="{{ $pcList->id }}" class="bg-[#f6f6f6]">{{ $pcList->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-[40%]">
                            <label class="mb-3">数量</label><br>
                            <div class="spinContainer">
                                <span class="spinner spinner-down">-</span>
                                <input type="number" name="quantity" value="1" data-reject-zero="true"
                                class="number" readonly>
                                <span class="spinner spinner-up">+</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end items-center">
                        <button type="submit" class="button2">リストに追加</button>
                    </div>
                </form>
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
