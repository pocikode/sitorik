<div class="w-full shadow-lg rounded-lg px-3 py-3">
    <h3 class="text-xl font-bold mb-3 text-gray-700">Berita Terbaru</h3>
    @foreach($articles as $article)
        <div class="flex items-center mb-5">
            <div class="w-36">
                <img class="w-full" src="{{ $article->image ? Storage::url($article->image) : 'https://placehold.co/600x400' }}" alt="{{ $article->title }}">
            </div>
            <a href="{{ route('articles.show', $article->slug) }}" class="w-full ml-3 hover:text-cyan-500">{{ $article->title }}</a>
        </div>
    @endforeach
</div>
