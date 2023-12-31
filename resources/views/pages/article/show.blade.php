<x-app-layout title="{{ $article->title }}">
    <section class="container max-w-3xl mx-auto">
        <h1 class="mt-5 mb-2 font-bold text-2xl text-gray-800">{{ $article->title }}</h1>
        <span class="block mb-1 text-sm text-gray-500">{{ $article->user->name }} {{ $article->created_at->format('d F, Y') }}</span>
        <img class="w-full" src="{{ $article->image ? Storage::url($article->image) : 'https://placehold.co/600x400' }}" alt="{{ $article->title }}">
        <div class="w-full text-lg text-gray-700">
            @foreach($article->trixRichText as $content)
                {!! $content->content !!}
            @endforeach
{{--            {!! $article->trixRichText->first()->content !!}--}}
        </div>
    </section>

    <div class="container max-w-6xl mx-auto">
        <h2 class="text-2xl font-bold mt-3">Komentar</h2>
        <div id="commento"></div>
    </div>

    @push('scripts')
        <script defer src="https://cdn.commento.io/js/commento.js"></script>
    @endpush
</x-app-layout>
