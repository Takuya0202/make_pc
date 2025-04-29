<x-layouts.app title="ホーム画面">
    {{-- headerコンポーネント --}}
    <x-layouts.header />
    <link rel="stylesheet" href="{{asset('css/priceBar.css')}}">
    <script src="{{asset('js/searchForm.js')}}"></script>
    <script src="{{asset('js/priceBar.js')}}"></script>
    {{-- パーツ検索機能 --}}
    <div class="mt-3 mb-5 mx-3">
        <form action="{{route('app.home.search')}}" method="get" class="flex items-center justify-start" id="searchForm">
            {{-- headerの情報と同期させる --}}
            <input type="hidden" name="category" value="" id="homeCategory">
            <input type="hidden" name="name" value="" id="homeName">
            {{-- ソート機能 --}}
            <div class="mx-5">
                <h2 class="ml-[10px] mb-1.5">並び替え</h2>
                <select name="sort" class="p-3 bg-white border-2 border-[#3e3e3e] rounded-xl" id="sort">
                    <option value="created_desc" @selected(request('sort') == 'created_desc')>新しい順</option>
                    <option value="created_asc" @selected(request('sort') == 'created_asc')>古い順</option>
                    <option value="price_desc" @selected(request('sort') == 'price_desc')>価格の高い順</option>
                    <option value="price_asc" @selected(request('sort') == 'price_asc')>価格の低い順</option>
                    <option value="review_desc" @selected(request('sort') == 'review_desc')>評価の高い順</option>
                    <option value="review_asc" @selected(request('sort') == 'review_asc')>評価の低い順</option>
                </select>
            </div>
            {{-- 値段検索 tailwind使わない --}}
            <div>
                <h2 class="rangeText">価格帯を選択</h2>
                <div class="container">
                    {{-- low値を表示するコンテナ --}}
                    <div class="low-num-container">
                        <input type="number" id="low-num" value="0" disabled>
                    </div>
                    <div class="slider-container">
                        {{--価格帯のバー --}}
                        <div class="range-bar" id="range-bar"></div>
                        {{-- 二つのノードを用意 --}}
                        <input type="range" name="highPrice" id="high" class="high" min="0" max="300000" step="5000" value="{{request('highPrice') ?? 300000}}">
                        <input type="range" name="lowPrice" id="low" class="low" min="0" max="300000" step="5000" value="{{request('lowPrice') ?? 0}}">
                    </div>
                    {{-- high値を表示するコンテナ --}}
                    <div class="high-num-container">
                        <input type="number"id="high-num" value="300000" disabled>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- パーツが一件も取得出来なかった。。。 --}}
    @if ($parts->isEmpty())
        <div class="flex items-center justify-center h-[80Vh] tracking-wider text-xl ">
            <h2>part not found</h2>
        </div>
    @endif
    {{-- パーツについてのコンテナ --}}
        <div class="grid grid-cols-4 gap-4 mx-5">
            @foreach ($parts as $part)
                <div class="w-full bg-white border-2 border-gray-200 rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 hover:scale-105 ">
                    {{-- 画像がpublicなら$part->imageを返し、storageならstorage/part->imageを返すようにする --}}
                    <a href="{{route('app.detail' ,['part_id' => $part->id ])}}">
                        <img src="{{asset(str_starts_with($part->image,'images') ? $part->image : 'storage/' . $part->image)}}"
                        alt="" class="w-full h-96 object-contain rounded-2xl">
                    </a>
                    <h2 class="mt-2 ml-3"><a href="{{route('app.detail' ,['part_id' => $part->id ])}}" class="text-blue-600 font-bold text-[30px] my-2">{{$part->name}}</a></h2>
                    {{-- れびゅy－の評価を星で表す --}}
                    @php
                        $rating = round($part->averageRatings(),1); //小数第一位まで
                        $ratingPercentage = ($rating / 5) * 100; //割合で表す
                    @endphp
                    {{-- グレーの星に黄色の星を上書きするようにする --}}
                    <div class="my-1.5 ml-2 relative inline-block text-yellow-400">
                        <div class="flex space-x-1">
                            @for ($i = 1; $i <= 5; $i++)
                                <span class="text-gray-400">★</span>
                            @endfor
                        </div>
                        <div class="absolute inset-0 flex space-x-1 overflow-hidden" style="width: {{$ratingPercentage}}%">
                            @for ($i = 1; $i <= 5; $i++)
                                <span class="text-yellow-400">★</span>
                            @endfor
                        </div>
                    </div>
                    <p class="mx-3 mb-3 font-semibold text-[#b0b0b8]">{{$part->detail}}</p>
                </div>
            @endforeach
        </div>
</x-layouts.app>
