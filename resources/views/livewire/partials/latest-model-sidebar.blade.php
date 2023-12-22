<div class="w-full shadow-lg rounded-lg px-3 py-3 sticky top-0">
    <h3 class="text-xl font-bold mb-3 text-gray-700">Model Terbaru</h3>
    @foreach($motorcycles as $motorcycle)
        <div class="flex items-center mb-5">
            <div class="w-36">
                <img class="w-full" src="{{ $motorcycle->picture?->image ? Storage::url($motorcycle->picture->image) : 'https://placehold.co/600x400' }}" alt="{{ $motorcycle->model_with_brand }}">
            </div>
            <a href="{{ route('motorcycles.show', [$motorcycle->brand->slug, $motorcycle->slug]) }}" class="w-full ml-3 hover:text-cyan-500">{{ $motorcycle->model_with_brand }}</a>
        </div>
    @endforeach
</div>
