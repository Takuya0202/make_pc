<x-layouts.app title="ホーム画面">
    <h1>home</h1>
    <form action="{{route('auth.logout')}}" method="POST">
        @csrf
        <input type="submit" value="ログアウト">
    </form>
</x-layouts.app>
