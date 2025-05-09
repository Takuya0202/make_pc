<x-layouts.admin title="{{$user->name}}"の情報>
    <div class="w-full h-full justify-center items-center">
        <div class="p-6 bg-white">
            <h2>ユーザー情報</h2>
            <div class="flex items-center">
                <p><img src="{{asset(str_starts_with($user->icon , 'images') ? $user->icon : 'storage/' . $user->icon) }}"
                    class="h-20 w-20 rounded-full object-fill"></p>
                <p class="font-bold text-2xl">{{$user->name}}</p>
            </div>
            <p>作成日: {{$user->created_at->format('')}}</p>
        </div>
    </div>
</x-layouts.admin>
