<div class="flex gap-x-4">
    @foreach($articles as $article)
        <div class="w-1/3 rounded-md shadow-xl">
            <img class="h-56 w-full" src="{{ $article->image ? Storage::url($article->image) : 'https://placehold.co/600x400' }}" alt="{{ $article->title }}">
            <div class="flex flex-col p-5">
                <a href="#" class="text-xl mb-2 text-neutral-800 font-bold">{{ $article->title }}</a>
                <p class="flex-1 text-neutral-700 text-sm">{{ Str::limit(strip_tags($article->trixRichText->first()->content), 150) }}</p>

                <div class="flex justify-between items-center mt-3">
                    <span class="mt-4 text-neutral-500 text-xs">{{ $article->user->name }}</span>
                    <span class="mt-4 text-neutral-500 text-xs">{{ $article->created_at->format('d M, Y') }}</span>
                </div>
            </div>
        </div>
    @endforeach
</div>
