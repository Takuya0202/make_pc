<div class="flex justify-center items-center  dark:bg-gray-900 min-h-screen">
    <div class="bg-white dark:bg-gray-800 w-[600px] sm:w-[600px] min-h-96 rounded-2xl shadow-lg p-6">
        <p class="text-xl font-semibold text-gray-800 dark:text-gray-200 text-center">{{ $title }}</p>
        <hr class="my-3 border-b-black border-2">
        <form action="{{$action}}" method="post" enctype="multipart/form-data">
            @csrf
            {{ $slot }}
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg transition">
                {{ $button }}
            </button>
        </form>
    </div>
</div>
