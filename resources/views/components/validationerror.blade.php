@if ($errors->any())
    <div class="bg-red-200 border-2 border-red-500 text-red-500 font-semibold p-2 mb-4 rounded-md">
        <ul>
            @foreach ($errors->all() as $error)
                <li>・{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif