<x-app-layout>
    @include('layouts.seach')
    <div id="section"></div>
    @include('components.validationerror')
        <form action="{{ route('field.update', $field->id) }}#section" method="post" enctype="multipart/form-data" class="flex flex-col items-center bg-white shadow-md rounded-md p-4 mb-4">
            @csrf
            @method('put')
            <div class="sm:flex w-full">
                <div class="sm:w-1/2 h-auto mb-4">
                    <img id="preview" src="{{ $field->image }}" alt="フィールド画像" class="mb-4">
                    <input type="file" id="image" name="image">
                    <input type="hidden" name="current_image" value="{{ $field->image }}">
                </div>
                <div class="text-center text-xl mb-4 sm:ml-4 sm:w-1/2 py-2">
                    <input type="text" name="field_name" value="{{ $field->name }}" class="w-full h-10 border-2 border-gray-300 rounded-md p-2 mb-4" placeholder="フィールド名">
                    <input type="text" name="post" value="{{ $field->post }}" class="w-full h-10 border-2 border-gray-300 rounded-md p-2 mb-4" placeholder="〒 xxx-xxxx">
                    <input type="text" name="address" value="{{ $field->address }}" class="w-full h-10 border-2 border-gray-300 rounded-md p-2 mb-4" placeholder="住所">
                    <input type="text" name="tel" value="{{ $field->tel }}" class="w-full h-10 border-2 border-gray-300 rounded-md p-2 mb-4" placeholder="TEL">
                    <input type="text" name="url" value="{{ $field->url }}" class="w-full h-10 border-2 border-gray-3000 rounded-md p-2 mb-4" placeholder="URL">
                </div>
            </div>
            <div class="mb-4 w-full">
                <textarea name="detail" class="w-full h-32 border-2 border-gray-300 rounded-md p-2" placeholder="フィールド説明">{{ $field->detail }}</textarea>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded-md">フィールド情報を更新する。</button>
        </form>
        <form action="{{ route('field.destroy', $field->id) }}" method="post" class="flex justify-center items-center p-4" onsubmit="return confirm('本当に削除しますか？');">
            @csrf
            @method('delete')
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold px-4 py-2 rounded-md ml-auto">フィールドを削除する。</button>
        </form>
</x-app-layout>

