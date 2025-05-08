<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{ $title }}</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background: #f9fafb;
        }
        .button{
            display: inline-block;
            background:#FAF9F6;
            padding: 10px 30px;
            color: #374151;
            font-weight: 500;
            transition: 0.3s ease-in-out;
            border: 1px #d1d5db solid;
            border-radius: 16px;
        }
        .button:hover{
            color: #fff;
            background:#F97316;
        }
        .button2 {
        display: inline-block;
        background: #f97316;
        color: white;
        padding: 10px 30px;
        font-weight: 600;
        border: none;
        border-radius: 16px;
        transition: all 0.3s ease-in-out;
        }
        .button2:hover {
        background: #ea580c;
        transform: scale(1.03);
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">
    <header>
        <div class="flex items-center justify-between w-full h-16 border-b-2 border-[#d1d5db]">
            <h2 class="font-bold text-2xl w-96 ml-5 my-5"><a href="{{route('admin.home')}}">dashbord</a></h2>
            <div class="flex items-center space-x-5 my-5 mr-5">
                <p class="button"><a href="{{route('app.home')}}">homeへ</a></p>
                <form action="{{route('auth.logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="button">ログアウト</button>
                </form>
            </div>
        </div>
    </header>
    <main class="flex-grow flex">
        <aside class="max-w-64 w-[20%] border-r-2 border-[#d1d5db] ">
            <div class="w-full h-full ">
                <ul class="my-3 mx-3 space-y-3">
                    <li><a href="{{route('admin.parts')}}">商品管理</a></li>
                    <li><a href="">ユーザー管理</a></li>
                    <li><a href="{{route('admin.reviews.index')}}">レビュー管理</a></li>
                    <li><a href="{{route('admin.part.create')}}">商品追加</a></li>
                </ul>
            </div>
        </aside>
        <div class="flex-1 ">
            {{ $slot }}
        </div>
    </main>
    <footer>
        <div class="flex justify-center items-center h-20 border-t-2 border-[#d1d5db] ">
            <div>
                <h1>MakePC</h1>
            </div>
        </div>
    </footer>
</body>
</html>
