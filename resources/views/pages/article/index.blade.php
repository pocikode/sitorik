<x-app-layout>
    <section class="container max-w-3xl mx-auto">
        <h1 class="mt-5 mb-2 font-bold text-3xl text-gray-800 mb-5">Berita dan Informasi Motor Listrik Terbaru</h1>
        <div class="flex flex-col gap-y-5">
            @foreach($articles as $article)
                <div class="flex w-full rounded-md shadow-xl">
                    <div class="w-1/3">
                        <img class="h-full rounded-l-lg" src="{{ $article->image ? Storage::url($article->image) : 'https://placehold.co/600x400' }}" alt="{{ $article->title }}">
                    </div>
                    <div class="w-2/3 flex flex-col p-5">
                        <a href="{{ route('articles.show', $article->slug) }}" class="text-xl mb-2 text-neutral-800 font-bold hover:text-blue-500">{{ $article->title }}</a>
                        <p class="flex-1 text-neutral-700 text-sm">{{ Str::limit(strip_tags($article->trixRichText->first()->content), 150) }}</p>

                        <span class="block mt-5 text-sm text-gray-500">{{ $article->user->name }} . {{ $article->created_at->isToday() ? 'Hari ini' : indonesian_date($article->created_at) }}</span>
{{--                        <div class="flex justify-between items-center mt-3">--}}
{{--                            <span class="mt-4 text-neutral-500 text-xs">{{ $article->user->name }}</span>--}}
{{--                            <span class="mt-4 text-neutral-500 text-xs">{{ $article->created_at->format('d M, Y') }}</span>--}}
{{--                        </div>--}}
                    </div>
                </div>
{{--                <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow w-full md:flex-row">--}}
{{--                    <img class="object-cover rounded-t-lg h-96 md:h-full md:w-48 md:rounded-none md:rounded-s-lg" src="{{ $article->image ? Storage::url($article->image) : 'https://placehold.co/600x400' }}" alt="{{ $article->title }}">--}}
{{--                    <div class="w-1/3">--}}
{{--                        <img class="h-full" src="{{ $article->image ? Storage::url($article->image) : 'https://placehold.co/600x400' }}" alt="{{ $article->title }}">--}}
{{--                    </div>--}}
{{--                    <div class="w-2/3 flex flex-col justify-between p-4 leading-normal">--}}
{{--                        <a href="#" class="mb-2 text-xl font-bold tracking-tight text-gray-900">{{ $article->title }}</a>--}}
{{--                        <p class="mb-3 font-normal text-gray-700">{{ Str::limit(strip_tags($article->trixRichText->first()->content), 150) }}</p>--}}
{{--                        <span class="block text-sm text-gray-500">{{ $article->user->name }} {{ $article->created_at->isToday() ? 'Hari ini' : indonesian_date($article->created_at) }}</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
            @endforeach
        </div>
    </section>
</x-app-layout>
