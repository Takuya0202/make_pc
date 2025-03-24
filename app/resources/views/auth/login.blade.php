<x-layouts.app title="ログイン">
    <x-auth.form
    title="ログイン"
    action="{{ route( 'auth.login')}}"
    button="ログイン">
    {{-- バリデーションエラーのコンポーネント --}}
    <x-auth.alert :$errors/>
    <div class="mb-4 flex flex-col sm:flex-row items-center gap-2">
        <label for="email" class="w-36 text-right">メールアドレス</label>
        <input type="email" name="email" value="{{ old('email') }}" class="w-full sm:w-[80%] px-4 py-2 rounded-2xl border border-gray-300 bg-zinc-200">
    </div>
    <div class="mb-4 flex flex-col sm:flex-row items-center gap-2">
        <label for="password" class="w-36 text-right">パスワード</label>
        <input type="password" name="password" id="password" class="w-full sm:w-[80%] px-4 py-2 rounded-2xl border border-gray-300 bg-zinc-200">
    </div>
    <div class="mb-4 flex content-center items-center ">
        <p>アカウントをお持ちでない方は<a href="{{route('auth.register')}}" class="text-blue-600">こちら</a></p>
    </div>
    </x-auth.form>
</x-layouts.app>
