<x-app-layout>
@include('layouts.seach')
    <section class="lg:grid grid-cols-2 gap-4">
    @foreach ($fields as $field)
        <div class="bg-white grid grid-cols-2 items-center p-2 shadow rounded mb-4">
            <div class="text-center max-w-full">
                <img src="{{ $field->image }}" alt="フィールド画像" class="h-48 object-cover">
                <a href="{{ $field->url }}" class="text-blue-400 hover:text-blue-500 font-semibold border-b border-blue-400 hover:border-blue-500">HPはコチラ</a>
            </div>
            <div class="w-full text-left px-2">
                <a href="{{ route('field.show', $field->id) }}#section" class="font-bold text-lime-950 hover:text-lime-800 mb-2">{{ $field->name }}</a>
                <p>〒{{ $field->post }}</p>
                <p>{{ $field->address }}</p>
                <div>
                @foreach ($field->reviews()->orderBy('updated_at', 'desc')->take(2)->get() as $review)
                    <div class="flex bg-gray-100 text-sm rounded-sm shadow py-2">
                        <span class="text-yellow-500 mr-1">{{ str_repeat('★', $review->rating) }}</span>
                        <p>{{ Str::limit($review->comment, 30) }}</p>
                    </div>
                    <p class="text-sm text-gray-500">{{ $review->updated_at->format('Y-m-d') }}</p>
                @endforeach
                </div>
            </div>
        </div>
    @endforeach
    </section>
    
</x-app-layout>