<x-layouts.app title="レビュー">
    <x-layouts.header />
    <div class="flex justify-center items-center mx-auto my-20 max-w-[1000px] min-w-[400px]">
        <div class="bg-[#f0f0f0] rounded-3xl shadow-2xl ">
            <form action="{{route('app.review',['part_id' => $part->id])}}" method="POST"
                class="p-5">
                @csrf
                <x-alert :$errors />
                <div class="flex justify-center items-center space-x-10">
                    <img src="{{asset(str_starts_with($part->image,'images') ? $part->image : 'storage/' . $part->image)}}"
                    alt="レビューする商品画像" class="w-20 h-20 rounded-3xl">
                    <p class="font-bold">{{$part->name}}</p>
                </div>
                <div class="my-5">
                    <div class="flex space-x-1 items-center justify-center flex-row-reverse">
                        {{-- レートはループの番号をradioのvalueに持たせて処理 --}}
                        @for ($i = 1; $i <= 5; $i++)
                            <input type="radio" name="rating" value="{{ 6 - $i }}" class="hidden peer"
                            id="rate_{{ 6 - $i }}">
                            <label for="rate_{{ 6 - $i }}" class="cursor-pointer text-gray-400 peer-checked:text-yellow-400 text-3xl">★</label>
                        @endfor
                    </div>
                </div>
                <div class="my-5">
                    <label for="body" class="">レビュー</label>
                    <input type="text" name="body" id="body" placeholder="レビューを投稿"
                    class="py-[10px] px-[30px]">
                </div>
                <div class="flex items-center">
                    <p class="mr-5"><a href="{{route('app.detail',['part_id' => $part->id ])}}"
                        class="px-[30px] py-[10px] rounded-3xl bg-black text-white">戻る</a></p>
                    <button type="submit" class="px-[30px] py-[10px] rounded-3xl bg-black text-white">レビューを送信</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>

