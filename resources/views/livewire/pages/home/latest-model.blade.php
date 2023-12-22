<div class="flex flex-row gap-x-4">
    @foreach($motorcycles as $motorcycle)
        <div class="basis-1/4">
            <img class="rounded-md"
                 src="{{ ($motorcycle->picture && $motorcycle->picture->image) ? Storage::url($motorcycle->picture->image) : 'https://placehold.co/600x400' }}" alt="{{ $motorcycle->model_with_brand }}">
            <a href="{{ route('motorcycles.show', [$motorcycle->brand->slug, $motorcycle->slug]) }}" class="block mt-4 hover:text-cyan-500">{{ $motorcycle->model_with_brand }}</a>
            <span class="font-extrabold">Rp {{ preg_replace("/\,?0+$/", "", number_format(($motorcycle->price / 1000000), 1, ',', '.')) }} Juta</span>
        </div>
    @endforeach
</div>
