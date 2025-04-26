<x-layouts.app title="myリスト">
    <link rel="stylesheet" href="{{asset('css/spinNumber.css')}}">
    <script src="{{asset('js/spinNumber.js')}}"></script>
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
                        <h1 class="text-2xl ml-3 border-b-2 border-[#d1d5db] pb-5">リスト内の商品</h1>
                        @foreach ($targetPcList->parts as $part)
                                <div class="w-full flex items-center justify-between border-b-2 border-[#d1d5db] bg-white px-3 py-5 ">
                                    <p class="ml-5 border-r-2 border-[#d1d5db] pr-3"><img src="{{asset(str_starts_with($part->image,'images') ? $part->image : 'storage/' . $part->image)}}" alt="リストに追加された商品画像"
                                        class="w-32 h-32 rounded-xl "></p>
                                    <p class="font-bold ">{{$part->name}}</p>
                                    <div class="block space-y-5 font-bold">
                                        <p>{{$part->price}} 円</p>
                                        <form action="{{route('app.list.update')}}" method="POST">
                                            @csrf
                                            {{-- パーツidとリストidを隠して送信 --}}
                                            <input type="text" value="{{$part->id}}" name="part_id" class="hidden">
                                            <input type="text" value="{{$targetPcList->id}}" name="pc_list_id" class="hidden">
                                            <div class="spinContainer">
                                                <span class="spinner spinner-down">-</span>
                                                <input type="number" name="quantity" value="{{$part->pivot->quantity}}"
                                                class="number" onchange="this.form.submit()">
                                                <span class="spinner spinner-up">+</span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
</x-layouts.app>
