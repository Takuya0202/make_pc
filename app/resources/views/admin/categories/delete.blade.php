<x-layouts.admin title="削除確認">

    <div class="h-full w-full flex items-center justify-center">
        <div class="bg-white w-[60%] max-w-[600px] hadow-md text-center p-6 rounded-xl">
            <form action="{{route('admin.categories.destroy', ['category_id' => $category->id])}}" method="post" >
                @csrf
                @method('DELETE')
                <p class="text-center text-xl font-bold my-5">本当に<span class="mx-2 text-2xl text-center text-red-600">{{$category->name}}</span>を削除しますか</p>
                <div class="flex items-center justify-center gap-6 mb-5">
                    <p><a href="{{route('admin.categories.index')}}" class="button2">キャンセル</a></p>
                    <button type="submit" class="button2 bg-red-600 hover:bg-red-700">削除する</button>
                </div>
            </form>
        </div>
    </div>

</x-layouts.admin>


