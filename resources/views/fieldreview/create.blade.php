<x-app-layout>
    @include('layouts.seach')
    <div id="section"></div>
    @include('components.validationerror')
        <form action="{{ route('field.store') }}#section" method="post" enctype="multipart/form-data" class="flex flex-col items-center bg-white shadow-md rounded-md p-4 mb-4">
            @csrf
            <div class="sm:flex w-full">
                <div class="sm:w-1/2 h-auto mb-4">
                    <img id="preview" src="{{ asset('/images/preview_img.png') }}" alt="フィールド画像" class="mb-4">
                    <input type="file" id="image" name="image">
                </div>
                <div class="text-center text-xl mb-4 sm:ml-4 sm:w-1/2 py-2">
                    <input type="text" name="field_name" class="w-full h-10 border-2 border-gray-300 rounded-md p-2 mb-4" value="{{ old('field_name') }}" placeholder="フィールド名">
                    <input type="text" name="post" class="w-full h-10 border-2 border-gray-300 rounded-md p-2 mb-4" value="{{ old('post') }}" placeholder="〒 xxx-xxxx">
                    <input type="text" name="address" class="w-full h-10 border-2 border-gray-300 rounded-md p-2 mb-4" value="{{ old('address') }}" placeholder="住所">
                    <input type="text" name="tel" class="w-full h-10 border-2 border-gray-300 rounded-md p-2 mb-4" value="{{ old('tel') }}" placeholder="TEL">
                    <input type="text" name="url" class="w-full h-10 border-2 border-gray-300 rounded-md p-2 mb-4" value="{{ old('url') }}" placeholder="URL">
                </div>
            </div>
            <div class="mb-4 w-full">
                <textarea name="detail" class="w-full h-32 border-2 border-gray-300 rounded-md p-2" value="{{ old('detail') }}" placeholder="フィールド説明"></textarea>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded-md">フィールド登録</button>
        </form>
</x-app-layout>