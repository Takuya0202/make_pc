<x-layouts.app title="myリスト">

    {{-- head情報 --}}
    <x-slot:head>
        <link rel="stylesheet" href="{{asset('css/spinNumber.css')}}">
        <script src="{{asset('js/spinNumber.js')}}"></script>
    </x-slot:head>

    {{-- header --}}
    <x-slot:header>
        <x-layouts.header />
    </x-slot:header>

    {{-- main --}}
        <div class="mt-10 mx-auto flex items-center justify-center w-[84%]">
            {{-- pclistの選択画面 --}}
            <div class="flex items-center space-x-5 mx-auto w-full justify-center">
                @if ($pcLists)
                    @foreach ($pcLists as $pcList)
                        <p><a href="{{ route('app.list',['pc_list_id' => $pcList->id ])}}"
                            class="button2">{{ $pcList->name }}</a></p>
                    @endforeach
                @endif
            </div>
        </div>

        {{-- リスト内のパーツ一覧 --}}
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
                                <div class="w-full flex justify-start border-b-2 border-[#d1d5db] bg-white px-3 py-5 ">
                                    {{-- 商品画像--}}
                                    <div class="">
                                        <p class="ml-5 mr-10"><img src="{{asset(str_starts_with($part->image,'images') ? $part->image : 'storage/' . $part->image)}}" alt="リストに追加された商品画像"
                                            class="w-40 h-40 rounded-xl "></p>
                                    </div>
                                    {{-- 商品概要 --}}
                                    <div class="flex-1">
                                        <p class="font-bold text-2xl text-blue-500"><a href="{{route('app.detail' , ['part_id' => $part->id])}}">{{$part->name}}</a></p>
                                        <div class="mt-5 font-semibold text-black">
                                            <p>カテゴリー {{$part->category->name}}</p>
                                            <p>メーカー {{$part->maker->name}}</p>
                                        </div>
                                    </div>
                                    {{-- 商品価格、数量 --}}
                                    <div class="w-[20%] min-w-96 font-bold">
                                        <p class="text-2xl w-full h-1/2 text-center">{{$part->price}} 円</p>
                                        <div class="flex justify-around items-center w-full m-auto h-1/2">
                                            <form action="{{route('app.list.update')}}" method="POST" data-submit="true" class="spinForm">
                                                @csrf
                                                @method('PUT')
                                                {{-- パーツidとリストidを隠して送信 --}}
                                                <input type="text" value="{{$part->id}}" name="part_id" class="hidden">
                                                <input type="text" value="{{$targetPcList->id}}" name="pc_list_id" class="hidden">
                                                <div class="spinContainer">
                                                    <span class="spinner spinner-down">-</span>
                                                    <input type="number" name="quantity" value="{{$part->pivot->quantity}}"
                                                    class="number" readonly>
                                                    <span class="spinner spinner-up">+</span>
                                                </div>
                                            </form>
                                            <form action="{{route('app.list.delete')}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                {{-- パーツidとリストidを隠して送信 --}}
                                                <input type="text" value="{{$part->id}}" name="part_id" class="hidden">
                                                <input type="text" value="{{$targetPcList->id}}" name="pc_list_id" class="hidden">
                                                <button type="submit" class="button">商品を削除</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
</x-layouts.app>
