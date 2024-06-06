<x-app-layout>
    @include('layouts.seach')
    <div id="section"></div>
    @include('components.validationerror')
    @if (session('success'))
        <div class="bg-green-400 p-4 rounded-md mb-2 text-white font-bold">
            {{ session('success') }}
        </div>
    @endif
    @foreach ($fields as $field)
        <div class="flex flex-col items-center bg-white shadow-md rounded-md p-4 mb-4">
            <div class="lg:flex w-full">
                <div class="lg:w-1/2 mb-4 object-cover">
                    <img src="{{ $field->image }}" alt="フィールド画像" class="">
                </div>
                <div class="text-center text-xl mb-4 lg:w-1/2 py-2">
                    <h2 class="text-3xl font-bold text-lime-950 mb-2">{{ $field->name }}</h2>
                    <p class="mb-2">〒 {{ $field->post }}</p>
                    <p class="mb-2">{{ $field->address }}</p>
                    <p class="mb-2">TEL {{ $field->tel }}</p>
                    <p class="mb-2">口コミ{{ $field->reviews->count() }}件 評価<span class="text-yellow-500">{{ str_repeat('★', $field->reviews->avg('rating')) }}</span></p>
                    <a href="{{ $field->url}}" class="text-blue-500 hover:text-blue-700 underline">HPはコチラから</a>
                </div>
            </div>
            <div class="text-center bg-gray-100 mb-4 w-full">
                <p class="p-4 whitespace-pre-wrap">{{ $field->detail }}</p>
            </div>
        </div>
        @auth
            @if (Auth::user()->is_admin)
            <div class="flex justify-center">
                <a href="{{ route('field.edit', $field->id) }}#section" class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded mb-4 shadow mx-auto block text-center">フィールド情報を編集する</a>
            </div>
            @endif
        @endauth
        <div class="flex flex-col items-center bg-white shadow-md rounded-md p-4 mb-4">
        @auth
            @if ($is_reviewed)
                <form action="{{ route('review.update', $field->id) }}#section" method="post" class="w-full">
                @csrf
                @method('put')
                    <label for="rating">評価</label>
                    <select name="rating" id="rating" class="w-full">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <label for="comment">コメント</label>
                    <textarea name="comment" id="comment" class="w-full"></textarea>
                    <input type="submit" value="更新する" class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded mb-4 shadow mx-auto block">
                </form>
            @else
                <form action="{{ route('review.store', $field->id) }}#section" method="post" class="w-full">
                @csrf
                <label for="rating">評価</label>
                    <select name="rating" id="rating" class="w-full">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <label for="comment">コメント</label>
                    <textarea name="comment" id="comment" class="w-full"></textarea>
                    <input type="submit" value="口コミを投稿する" class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded mb-4 shadow mx-auto block">
                </form>
            @endif
        @else
        @php
            $url = url()->current();
        @endphp
            <a href="{{ route('login', ['source' => 'review', 'redirect' => $url]) }}" class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded mb-4 shadow">ログインして口コミを投稿する。</a>
        @endauth
            <div class="reviews w-full">
                <h3 class="text-lg font-bold mb-2">みんなの口コミ</h3>
                @foreach ($field->reviews()->orderBy('updated_at', 'desc')->get() as $review)
                    <div class="bg-gray-100 rounded-sm shadow p-2 mb-4">
                        <span class="text-yellow-500">{{ str_repeat('★', $review->rating) }}</span>
                        <p class="whitespace-pre-wrap">{{ $review->comment }}</p>
                        <p class="text-sm text-gray-500">{{ $review->updated_at->format('Y年m月d日') }}-{{ $review->user->name }}-</p>
                    </div>
                @endforeach
            </div>
        </div>
        
    @endforeach
</x-app-layout>

