<x-layouts.app title="レビュー">
    <x-layouts.header />
    <div class="flex justify-center items-center m-auto max-w-[800px] min-w-[400px]">
        <div class="">
            <form action="{{route('app.review',['id' => $part->id])}}" method="POST"
                class="p-5">
                @csrf
                <x-alert :$errors />
                <div class="flex justify-center items-center space-x-10">
                    <img src="{{asset(str_starts_with($part->image,'images') ? $part->image : 'storage/' . $part->image)}}"
                    alt="レビューする商品画像" class="w-20 h-20 rounded-3xl">
                    <p class="font-bold">{{$part->name}}</p>
                </div>
                <div class="my-20">
                    <div class="flex space-x-1 items-center">
                        {{-- レートはループの番号をradioのvalueに持たせて処理 --}}
                        @for ($i = 1; $i <= 5; $i++)
                            <input type="radio" name="rating" value="{{ $i }}" class="hidden peer"
                            id="rate_{{ $i }}">
                            <label for="rate_{{ $i }}" class="cursor-pointer text-gray-400 peer-checked:text-yellow-400 text-3xl">★</label>
                        @endfor
                    </div>
                </div>
                <div class="my-5">
                    <label for="body" class="">レビュー</label>
                    <textarea name="body" id="body" rows="5" placeholder="商品をレビュー"
                    class="p-5 h-20 bg-gray-300 border-2 border-zinc-600"></textarea>
                </div>
                <button type="submit" class="px-[30px] py-[10px] rounded-3xl bg-black text-white">レビューを送信</button>
            </form>
        </div>
    </div>
    <x-layouts.footer />
</x-layouts.app>

