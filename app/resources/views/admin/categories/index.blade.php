<x-layouts.admin title="カテゴリー一覧">
    <div class="p-4 rounded-xl m-4 bg-white">

        <div class="flex items-center space-x-10 mb-4 ml-3">
            <h2 class="text-xl font-bold">全てのカテゴリー</h2>
            {{-- 追加ボタン --}}
            <div class="flex justify-end flex-1">
                <p class="mr-5"><a href="{{route('admin.categories.create')}}" class="button2">カテゴリーを追加</a></p>
            </div>
        </div>

        @foreach ($categories as $category)
            <div class="border-b-2 border-[#d1d5db] p-1.5 flex items-center space-x-8">
                <p class="font-bold text-2xl">{{$category->name}}</p>
                <p>このカテゴリに所属しているパーツ：<span class="text-orange-400 font-bold text-2xl">{{$category->parts_count}}</span> 件</p>
                {{-- 削除ボタン --}}
                <div class="flex items-center flex-1 justify-end mr-5 space-x-8">
                    <p class="mr-10"><a href="{{route('admin.categories.delete' , ['category_id' => $category->id])}}" class="button2 bg-red-600 hover:bg-red-700">削除</a></p>
                </div>
            </div>
        @endforeach

    </div>

</x-layouts.admin>
