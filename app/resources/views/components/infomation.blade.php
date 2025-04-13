@if (session('success'))
    <div class="my-2">
        <p class="inline-block text-2xl font-semibold border-b-2 border-gray-300 pb-1.5">
            {{ session('success') }}
        </p>
    </div>
@endif

