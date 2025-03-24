<x-layouts.app title="ユーザー登録">
    {{-- ユーザフォームのコンポーネント --}}
    <x-auth.form
    title="新規登録"
    action="{{route('auth.register')}}"
    button="登録">
    {{-- バリデーションエラーのアラートコンポーネント --}}
    <x-auth.alert :$errors/>
    {{-- アイコン表示　プレビューも表示 --}}
        <div class="mb-4 flex justify-center items-center">
            <label for="icon" class="cursor-pointer">
                <img src="{{ asset('images/default-icon.png') }}" id="preview"
                class="w-20 h-20 rounded-full object-cover border-2 border-gray-300">
            </label>
            <input type="file" name="icon" class="hidden" id="icon">
        </div>
        {{-- プレビューのスクリプト --}}
        <script src="{{ asset('js/preview.js') }}"></script>
        <div class="mb-4 flex flex-col sm:flex-row items-center gap-2">
            <label for="name" class="w-36 text-right">名前</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full sm:w-[80%] px-4 py-2 rounded-2xl border border-gray-300 bg-zinc-200">
        </div>
        <div class="mb-4 flex flex-col sm:flex-row items-center gap-2">
            <label for="email" class="w-36 text-right">メールアドレス</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full sm:w-[80%] px-4 py-2 rounded-2xl border border-gray-300 bg-zinc-200">
        </div>
        <div class="mb-4 flex flex-col sm:flex-row items-center gap-2">
            <label for="password" class="w-36 text-right">パスワード</label>
            <input type="password" name="password" id="password" class="w-full sm:w-[80%] px-4 py-2 rounded-2xl border border-gray-300 bg-zinc-200">
        </div>
        <div class="mb-4 flex flex-col sm:flex-row items-center gap-2">
            <label for="password_confirmation" class="w-36 text-right">パスワード再確認</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full sm:w-[80%] px-4 py-2 rounded-2xl border border-gray-300 bg-zinc-200">
        </div>
        <div class="mb-4 flex content-center items-center ">
            <p>既にログイン済みの方は<a href="{{route('auth.login')}}" class="text-blue-600">こちら</a></p>
        </div>
    </x-auth.form>
</x-layouts.app>

