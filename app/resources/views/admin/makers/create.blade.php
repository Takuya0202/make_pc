<x-layouts.admin title="メーカー作成">

    <div class="flex items-center justify-center h-full w-full">

    {{-- カテゴリ追加ページ --}}
        <form action="{{route('admin.makers.store')}}" method="post" class="w-[40%] p-4 rounded-md bg-white">

            {{-- アラートコンポーネント --}}
            <x-alert :$errors />

            @csrf
            <input type="text" name="name" placeholder="メーカー名を入力" class="p-4 border-2 border-[#3e3e3e] rounded-md block w-full mb-3"
            value="{{old('name')}}">
            <div class="flex items-center justify-end space-x-8">
                <p><a href="{{route('admin.makers.index')}}" class="button2">キャンセル</a></p>
                <button type="submit" class="button2">追加</button>
            </div>
        </form>
    </div>

</x-layouts.admin>
