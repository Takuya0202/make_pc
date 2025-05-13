<x-layouts.admin title="パーツ編集">
    <script src="{{asset('js/preview.js')}}"></script>
    <form action="{{route('admin.part.update' , ['part_id' => $part->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="p-6 bg-white m-5 shadow-md">
            {{-- アラートコンポーネント --}}
            <x-alert :$errors />
            {{-- パーツ画像 --}}
            <div class="flex items-center justify-center space-x-8 mb-5">
                <label for="image" class="cursor-pointer">
                    <img src="{{asset(str_starts_with($part->image,'images') ? $part->image : 'storage/' . $part->image)}}"
                    class="w-40 h-40" id="preview">
                </label>
                <input type="file" name="image" class="file-input hidden" id="image" >
            </div>
            {{-- パーツ概要 --}}
            <div class="flex items-center space-x-8 mb-5">
                <label class="text-xl font-semibold">パーツ名</label>
                <input type="text" value="{{old('name',$part->name)}}" name="name"
                class="p-4 flex-1 border-2 border-black cursor-pointer">
            </div>
            <div class="flex items-center space-x-8 mb-5">
                <label class="text-xl font-semibold">パーツ説明</label>
                <textarea class="p-4 flex-1 border-2 border-black cursor-pointer" cols="30" rows="10" name="detail">{{old('detail' , $part->detail)}}</textarea>
            </div>
            <div class="flex items-center space-x-8 mb-5">
                <label class="text-xl font-semibold">価格</label>
                <input type="text" value="{{old('price',$part->price)}}" name="price"
                class="p-4 flex-1 border-2 border-black cursor-pointer">
            </div>
            <div class="flex items-center space-x-8 mb-5">
                <label class="text-xl font-semibold">url</label>
                <input type="text" name="url" class="p-4 flex-1 border-2 border-black cursor-pointer"
                value="{{old('url',$part->url)}}">
            </div>
            <div class="flex items-center space-x-8 mb-5">
                <label class="text-xl font-semibold">メーカー</label>
                <select name="maker_id" class="p-2 border-2 border-black">
                    @foreach ($makers as $maker)
                        <option value="{{$maker->id}}" @selected(old('maker_id' , $part->maker_id) == $maker->id)>{{$maker->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center space-x-8 mb-5">
                <label class="text-xl font-semibold">カテゴリー</label>
                <select name="category_id" class="border-2 border-black p-2">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" @selected(old('category_id' , $part->category_id) == $category->id)>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            {{-- 戻る,変更ボタン --}}
            <div class="flex items-center justify-end space-x-8 mb-5">
                <p class="button2 ml-5"><a href="{{route('admin.parts')}}">戻る</a></p>
                <button type="submit" class="button2">パーツ内容を変更</button>
            </div>
        </div>
    </form>
</x-layouts.admin>
