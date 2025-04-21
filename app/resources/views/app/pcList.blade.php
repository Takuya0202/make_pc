<x-layouts.app title="myリスト">
    <x-layouts.header />
        <div class="mt-10 mx-auto flex items-center justify-center w-[84%]">
            {{-- pclistの選択画面 --}}
            <div class="flex items-center space-x-5 mx-auto w-full justify-center">
                @if ($pcLists)
                    @foreach ($pcLists as $pcList)
                        <p><a href="{{ route('app.list',['pc_list_id' => $pcList->id ])}}"
                            class="px-[30px] py-[10px] bg-black text-white rounded-xl">{{ $pcList->name }}</a></p>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="mt-10 mx-auto flex items-center justify-center w-[84%]">
            <div class="w-full">
                @if ($targetPcList)
                    <div class="flex items-center justify-around w-80 my-5 bg-white p-5 rounded-xl font-semibold ">
                        <p class="">合計金額</p>
                        <p class="">￥ {{$totalPrice}}</p>
                    </div>
                    <div class="bg-white shadow-2xl py-5 px-2">
                        <h1 class="text-2xl mb-3 ml-3 ">リスト内の商品</h1>
                        @foreach ($targetPcList->parts as $part)
                                <div class="w-full flex items-center justify-between border-y-2 border-[#d1d5db] bg-white px-3 py-5 ">
                                    <p class="ml-5 border-r-2 border-[#d1d5db] pr-3"><img src="{{asset(str_starts_with($part->image,'images') ? $part->image : 'storage/' . $part->image)}}" alt="リストに追加された商品画像"
                                        class="w-32 h-32 rounded-xl "></p>
                                    <p class="font-bold ">{{$part->name}}</p>
                                    <div class="block space-y-5 font-bold">
                                        <p>{{$part->price}} 円</p>
                                        <p>{{$part->pivot->quantity}}</p>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
</x-layouts.app>
