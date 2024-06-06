<header class="flex justify-between items-center py-2 md:mx-40 mx-1 my-0">
<a href="{{ route('home') }}">
    <img src="{{ asset('/images/site-logo2.png') }}" alt="サイトロゴ" class="w-72">
</a>
<div class="text-center">
@auth
    <!-- web.phpのprofile.editという名前のメソッドを実行 -->
    <a href="{{ route('profile.edit') }}">
        <button class="font-bold text-white bg-green-600 px-4 py-2 mb-2 rounded-md hover:bg-white hover:text-green-600 border border-green-600">マイページ</button>
    </a>
@endauth
@auth
    <!-- 管理者だけフィールドの追加ボタンを表示 -->
        @if (Auth::user()->is_admin)
            <a href="{{ route('field.create') }}#section">
            <button class="font-bold text-white bg-blue-600 px-4 py-2 rounded-md hover:bg-blue-800">フィールドの追加</button>
            </a>
        @endif
@endauth
@guest
    <!-- auth.phpのregisterという名前のメソッドを実行 -->
    <a href="{{ route('register') }}">
        <button class="font-bold text-white bg-green-600 px-4 py-2 mb-2 rounded-md hover:bg-white hover:text-green-600 border border-green-600">会員登録</button>
    </a>
    <!-- auth.phpのloginという名前のメソッドを実行 -->
    <a href="{{ route('login', ['source' => 'header']) }}">
        <button class="font-bold text-white bg-green-600 px-4 py-2 rounded-md hover:bg-white hover:text-green-600 border border-green-600">ログイン</button>
    </a>
@endauth       
</div>
</header>