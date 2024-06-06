<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- アプリケーション名を取得してタイトルに設定する。何も設定されていない場合はLaravelという文字列が使用される -->
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- アプリケーションのCSSファイルを読み込む -->
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

        <script src="https://cdn.tailwindcss.com"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-neutral-50 m-0 p-0">
        <!-- ここに共通ヘッダーのコンポーネントを読み込む -->
        @include('layouts.header')
        
        <main class="md:mx-40 mx-1">
            {{ $slot }}
        </main>
        @include('layouts.footer')
    </body>
</html>
