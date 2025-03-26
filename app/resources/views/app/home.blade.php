<x-layouts.app title="ホーム画面">
    {{-- headerコンポーネント --}}
    <x-layouts.header />
    {{-- パーツについてのコンテナ --}}
        <div class="grid grid-cols-4 gap-4">
            @foreach ($parts as $part)
                <div class="w-full shadow-2xl bg-gray-700 p-4 rounded-2xl ">
                    {{-- 画像がpublicなら$part->imageを返し、storageならstorage/part->imageを返すようにする --}}
                    <img src="{{asset(str_starts_with($part->image,'storage') ? 'storage' . $part->image : $part->image)}}"
                    alt="" class="w-full h-96 object-fill ">
                    <h2><a href="" class="text-blue-600 font-semibold text-[30px] my-2">{{$part->name}}</a></h2>
                    <p>{{$part->detail}}</p>
                </div>
            @endforeach
        </div>
    {{-- footerコンポーネント --}}
    <x-layouts.footer />
</x-layouts.app>
