<x-layouts.admin title="パーツ一覧">
    <div class="bg-white p-6 rounded-2xl shadow-md m-5">

        {{-- パーツ検索 --}}
        <div class="flex items-center space-x-10 mb-4 ml-3">
            <h2 class="text-xl font-bold">全てのパーツ</h2>

            <form action="{{route('admin.part.search')}}" method="get" class="flex items-center space-x-5">

                {{-- 並び替え --}}
                <select name="sort" class="p-3 bg-white border-2 border-[#3e3e3e] rounded-xl " onchange="this.form.submit()">
                    <option value="created_desc" @selected(request('sort') == 'created_desc')>新しい順</option>
                    <option value="created_asc" @selected(request('sort') == 'created_asc')>古い順</option>
                    <option value="price_desc" @selected(request('sort') == 'price_desc')>価格の高い順</option>
                    <option value="price_asc" @selected(request('sort') == 'price_asc')>価格の低い順</option>
                    <option value="review_desc" @selected(request('sort') == 'review_desc')>評価の高い順</option>
                    <option value="review_asc" @selected(request('sort') == 'review_asc')>評価の低い順</option>
                </select>

                {{-- キーワード検索 --}}
                <div class="space-x-5">
                    <input type="text" name="key" value="{{request('key')}}" placeholder="キーワードを入力"
                    class="p-3 border-2 border-[#3e3e3e] rounded-md w-96">
                    <button type="submit" class="button2">検索</button>
                </div>

            </form>

            {{-- 追加ボタン --}}
            <div class="flex justify-end flex-1">
                <p class="mr-5"><a href="{{route('admin.part.create')}}" class="button2">パーツを追加</a></p>
            </div>
        </div>

        {{-- パーツ一覧 --}}
        <ul class="space-y-3 my-2">
            @foreach ($parts as $part)
                <li class="flex items-center justify-start space-x-8 border-b-2 border-[#d1d5db] pb-2">
                    {{-- パーツ画像、名前、価格、メーカーとカテゴリ,平均評価 --}}
                    <p><img src="{{asset(str_starts_with($part->image,'images') ? $part->image : 'storage/' . $part->image)}}"
                        class="w-12 h-12 rounded-xl"></p>
                    <p class="font-bold text-xl text-blue-700"><a href="{{route('admin.part', ['part_id' => $part->id])}}">{{$part->name}}</a></p>
                    <p class="font-bold text-xl">¥ {{$part->price}}</p>
                    <p class="text-[#3e3e3e]">({{$part->maker->name}} - {{$part->category->name}})</p>

                    {{-- 星評価 --}}
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

                    <div class="flex items-center flex-1 justify-end mr-5 space-x-8">
                        <p><a href="{{route('admin.part.edit' , ['part_id' => $part->id])}}" class="button2">編集</a></p>
                        <p><a href="{{route('admin.part.delete' , ['part_id' => $part->id])}}" class="button2 bg-red-600 hover:bg-red-700">削除</a></p>
                    </div>
                </li>
            @endforeach
        </ul>

    </div>
</x-layouts.admin>
