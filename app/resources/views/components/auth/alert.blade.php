@if ($errors ->any())
    <div class="bg-red-100 border-2 border-red-400 text-red-700 px-4 py-3 rounded-2xl mb-4">
        @foreach ($errors->all() as $error)
            <li> {{ $error}}</li>
            {{-- バリデーションエラーが3つ以上の場合、ループを止める --}}
            @if ($loop->iteration >= 3)
                @break
            @endif
        @endforeach
        @if ($overThreeErrors())
            <li>...以下略</li>
        @endif
    </div>
@endif

