<x-layouts.admin title="パーツ一覧">
    <div class="bg-white p-6 rounded-2xl shadow-md m-5">
        <div class="flex items-center space-x-10 mb-4 ml-3">
            <h2 class="text-xl font-bold">全てのパーツ</h2>
            <p><a href="{{route('admin.part.create')}}" class="button2">パーツを追加</a></p>
        </div>
        <ul class="space-y-3 my-2">
            @foreach ($parts as $part)
                <li class="flex items-center justify-start space-x-8 border-b-2 border-[#d1d5db] pb-2">
                    {{-- パーツ画像、名前、メーカーとカテゴリ --}}
                    <p><img src="{{asset(str_starts_with($part->image,'images') ? $part->image : 'storage/' . $part->image)}}"
                        class="w-12 h-12 rounded-xl"></p>
                    <p class="font-bold text-xl text-blue-700"><a href="{{route('admin.part', ['part_id' => $part->id])}}">{{$part->name}}</a></p>
                    <p class="text-[#3e3e3e]">({{$part->maker->name}} - {{$part->category->name}})</p>
                </li>
            @endforeach
        </ul>
    </div>
</x-layouts.admin>
