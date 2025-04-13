<x-layouts.app title="ホーム画面">
    {{-- headerコンポーネント --}}
    <x-layouts.header />
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
