<x-layouts.app title="レビュー">

    {{-- header --}}
    <x-slot:header>
        <x-layouts.header />
    </x-slot:header>

    {{-- main --}}
    <div class="flex justify-center items-center mx-auto my-20 max-w-[1000px] w-[60%]">
        <div class="bg-[#f0f0f0] rounded-3xl shadow-2xl w-full">
            <form action="{{route('app.review',['part_id' => $part->id])}}" method="POST"
                class="p-5">
                @csrf
                <x-alert :$errors />
                <div class="flex justify-start items-center space-x-10">
                    <img src="{{asset(str_starts_with($part->image,'images') ? $part->image : 'storage/' . $part->image)}}"
                    alt="レビューする商品画像" class="w-14 h-14 rounded-3xl">
                    <p class="font-bold">{{$part->name}}</p>
                </div>
                <div class="my-3 flex justify-start">
                    <div class="flex space-x-1 items-center justify-center flex-row-reverse">
                        {{-- レートはループの番号をradioのvalueに持たせて処理 --}}
                        @for ($i = 1; $i <= 5; $i++)
                            <input type="radio" name="rating" value="{{ 6 - $i }}" class="hidden peer"
                            id="rate_{{ 6 - $i }}">
                            <label for="rate_{{ 6 - $i }}" class="cursor-pointer text-gray-400 peer-checked:text-yellow-400 text-3xl">★</label>
                        @endfor
                    </div>
                </div>
                <div>
                    <label for="body" class="font-bold mb-3 mx-3">レビューを書く</label> <br class="h-3">
                    <textarea name="body"  cols="30" rows="10" placeholder="商品について" class="w-full pl-3 pt-3 mt-3" >{{old('body')}}</textarea>
                </div>
                <div class="flex items-center justify-end mt-3">
                    <p class="mr-5"><a href="{{route('app.detail',['part_id' => $part->id ])}}"
                        class="button2">戻る</a></p>
                    <button type="submit" class="button2 bg-yellow-400 hover:bg-yellow-500 ">レビューを送信</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>

