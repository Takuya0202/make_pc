<x-layouts.app title="ダッシュボード">
    <header>
        <div class="flex items-center justify-between w-full h-16 border-b-2 border-[#d1d5db]">
            <h2 class="font-bold text-2xl w-96 ml-5 my-5"><a href="{{route('admin.home')}}">dashbord</a></h2>
            <div class="my-5 mr-5">
                <form action="{{route('auth.logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="button">ログアウト</button>
                </form>
            </div>
        </div>
    </header>
    <main>
        <p>商品一覧</p>
    </main>
</x-layouts.header>
