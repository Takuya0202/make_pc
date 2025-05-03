<x-layouts.admin title="パーツ詳細">
    <div class="p-6 bg-white m-5 shadow-md">
        {{-- パーツ画像 --}}
        <p><img src="{{asset(str_starts_with($part->image,'images') ? $part->image : 'storage/' . $part->image)}}"
            class="w-40 h-40 mx-auto my-5"></p>
        {{-- パーツ概要 --}}
        <div class="flex items-center space-x-8 mb-5">
            <label class="text-xl font-semibold">パーツ名</label>
            <input type="text" value="{{$part->name}}" readonly
            class="p-4 flex-1 border-2 border-black">
        </div>
        <div class="flex items-center space-x-8 mb-5">
            <label class="text-xl font-semibold">パーツ説明</label>
            <textarea class="p-4 flex-1 border-2 border-black" cols="30" rows="10" readonly>{{$part->detail}}</textarea>
        </div>
        <div class="flex items-center space-x-8 mb-5">
            <label class="text-xl font-semibold">価格</label>
            <input type="text" value="{{$part->price}}" readonly
            class="p-4 flex-1 border-2 border-black">
        </div>
        <div class="flex items-center space-x-8 mb-5">
            <label class="text-xl font-semibold">url</label>
            <p class="p-4 flex-1 border-2 border-black text-blue-700"><a href="{{$part->url}}" target="_blank">{{$part->url}}</a></p>
        </div>
        <div class="flex items-center space-x-8 mb-5">
            <label class="text-xl font-semibold">メーカー</label>
            <p class="p-4 flex-1 border-2 border-black text-blue-700"><a href="" target="_blank">{{$part->maker->name}}</a></p>
        </div>
        <div class="flex items-center space-x-8 mb-5">
            <label class="text-xl font-semibold">url</label>
            <p class="p-4 flex-1 border-2 border-black text-blue-700"><a href="" target="_blank">{{$part->category->name}}</a></p>
        </div>
        {{-- レビュー、パーツ編集、削除ボタン --}}
        <div class="flex items-center justify-end space-x-8 mb-5">
            <p class="button2 ml-5"><a href="{{route('admin.parts')}}">戻る</a></p>
            <div class="flex flex-1 justify-end items-center space-x-8">
                <p class="button2"><a href="">このパーツのレビューを確認</a></p>
                <p class="button2"><a href="{{route('admin.part.edit' , ['part_id' => $part->id])}}">パーツを編集</a></p>
                <p class="button2"><a href="{{route('admin.part.delete' , ['part_id' => $part->id])}}">パーツを削除</a></p>
            </div>
        </div>
    </div>
</x-layouts.admin>
