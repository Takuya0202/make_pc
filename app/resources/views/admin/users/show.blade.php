<x-layouts.admin title="{{$user->name}}の情報">
    <div class="w-full h-full justify-center items-center">
        <div class="p-6 bg-white">
            <h2>ユーザー情報</h2>
            <div class="flex items-center">
                <div><img src="{{asset(str_starts_with($user->icon , 'images') ? $user->icon : 'storage/' . $user->icon) }}"
                    class="h-20 w-20 rounded-full object-fill"></div>
                <p class="font-bold text-2xl">{{$user->name}}</p>
            </div>
            <p>作成日: {{$user->created_at->format('Y年n月j日 H:i')}}</p>
            <p>権限：{{$user->is_admin ? "管理者ユーザー" : "一般ユーザー"}}</p>
            <p>email : </p>
        </div>
    </div>
</x-layouts.admin>
