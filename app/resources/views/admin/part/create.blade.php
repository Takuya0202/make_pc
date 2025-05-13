<x-layouts.admin title="パーツ追加">

    {{-- head追加 --}}
    <x-slot:head>
        <script src="{{asset('js/preview.js')}}"></script>
        <script>
            // これはbladeないじゃないとname()を参照してくれないので別ファイルは不可能
            document.addEventListener('DOMContentLoaded',() => {
                // カテゴリー欄で追加を選択されたときにリンクへとばす
                const categorySelect = document.getElementById('categorySelect');
                categorySelect.addEventListener('change',(event) => {
                    if (event.target.value == 'add-category') {
                        window.location.href = "{{route('admin.categories.create')}}";
                    }
                })

                // メーカー追加を選択されたときにリンクへとばす
                const makerSelect = document.getElementById('makerSelect');
                makerSelect.addEventListener('change',(event) => {
                    if (event.target.value == 'add-maker') {
                        window.location.href = "{{route('admin.makers.create')}}";
                    }
                })
            })
        </script>
    </x-slot:head>

    <form action="{{route('admin.part.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="p-6 bg-white m-5 shadow-md">
            {{-- アラートコンポーネント --}}
            <x-alert :$errors />
            {{-- パーツ画像 --}}
            <div class="flex items-center justify-center space-x-8 mb-5">
                <label for="image" class="cursor-pointer">
                    <img src="{{asset('images/no-image.png')}}"
                    class="w-40 h-40 " id="preview">
                </label>
                <input type="file" name="image" class="file-input hidden" id="image" >
            </div>
            {{-- パーツ概要 --}}
            <div class="flex items-center space-x-8 mb-5">
                <label class="text-xl font-semibold">パーツ名</label>
                <input type="text" value="{{old('name')}}" name="name"
                class="p-4 flex-1 border-2 border-black cursor-pointer">
            </div>
            <div class="flex items-center space-x-8 mb-5">
                <label class="text-xl font-semibold">パーツ説明</label>
                <textarea class="p-4 flex-1 border-2 border-black cursor-pointer" cols="30" rows="10" name="detail">{{old('detail')}}</textarea>
            </div>
            <div class="flex items-center space-x-8 mb-5">
                <label class="text-xl font-semibold">価格</label>
                <input type="text" value="{{old('price')}}" name="price"
                class="p-4 flex-1 border-2 border-black cursor-pointer">
            </div>
            <div class="flex items-center space-x-8 mb-5">
                <label class="text-xl font-semibold">url</label>
                <input type="text" name="url" class="p-4 flex-1 border-2 border-black cursor-pointer"
                value="{{old('url')}}">
            </div>
            <div class="flex items-center space-x-8 mb-5">
                <label class="text-xl font-semibold">メーカー</label>
                <select name="maker_id" class="p-2 border-2 border-black" id="makerSelect">
                    @foreach ($makers as $maker)
                        <option value="{{$maker->id}}" @selected(old('maker_id') == $maker->id)>{{$maker->name}}</option>
                    @endforeach
                    <option value="add-maker">メーカーを追加</option>
                </select>
            </div>
            <div class="flex items-center space-x-8 mb-5">
                <label class="text-xl font-semibold">カテゴリー</label>
                <select name="category_id" class="border-2 border-black p-2" id="categorySelect">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" @selected(old('category_id') == $category->id)>{{$category->name}}</option>
                    @endforeach
                    <option value="add-category">カテゴリーを追加</option>
                </select>
            </div>
            {{-- 戻る,変更ボタン --}}
            <div class="flex items-center justify-end space-x-8 mb-5">
                <p class="button2 ml-5"><a href="{{route('admin.parts')}}">戻る</a></p>
                <button type="submit" class="button2">パーツを追加</button>
            </div>
        </div>
    </form>
</x-layouts.admin>
