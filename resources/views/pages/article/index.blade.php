<x-app-layout>
    <section class="container max-w-3xl mx-auto" x-data="articles">
        <h1 class="mt-5 mb-5 font-bold text-3xl text-gray-800">Berita dan Informasi Motor Listrik Terbaru</h1>
        <div class="flex flex-col gap-y-5">
            <template x-for="article in data">
                <div class="flex w-full rounded-md shadow-xl">
                    <div class="w-1/3">
                        <img class="h-full rounded-l-lg" :src="article.image_url" :alt="article.title">
                    </div>
                    <div class="w-2/3 flex flex-col p-5">
                        <a :href="'{{ route('articles') }}/' + article.slug " class="text-xl mb-2 text-neutral-800 font-bold hover:text-blue-500" x-text="article.title"></a>
                        <p class="flex-1 text-neutral-700 text-sm" x-text="article.excerpt"></p>

                        <span class="block mt-5 text-sm text-gray-500"><span x-text="article.user.name"></span> . <span x-text="article.post_date"></span></span>
                    </div>
                </div>
            </template>

            <div class="bg-white h-64 w-full flex text-pink-600" id="infinite-scroll-trigger">
                <div class="w-full flex items-center justify-center" x-show="loading">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Loading...</span>
                </div>
            </div>
{{--            @foreach($articles as $article)--}}
{{--                <div class="flex w-full rounded-md shadow-xl">--}}
{{--                    <div class="w-1/3">--}}
{{--                        <img class="h-full rounded-l-lg" src="{{ $article->image ? Storage::url($article->image) : 'https://placehold.co/600x400' }}" alt="{{ $article->title }}">--}}
{{--                    </div>--}}
{{--                    <div class="w-2/3 flex flex-col p-5">--}}
{{--                        <a href="{{ route('articles.show', $article->slug) }}" class="text-xl mb-2 text-neutral-800 font-bold hover:text-blue-500">{{ $article->title }}</a>--}}
{{--                        <p class="flex-1 text-neutral-700 text-sm">{{ Str::limit(strip_tags($article->trixRichText->first()->content), 150) }}</p>--}}

{{--                        <span class="block mt-5 text-sm text-gray-500">{{ $article->user->name }} . {{ $article->created_at->isToday() ? 'Hari ini' : indonesian_date($article->created_at) }}</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
        </div>
    </section>

    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('articles', () => ({
                    data: [],
                    page: 0,
                    last_page: null,
                    loading: false,
                    triggerElement: null,
                    init() {
                        this.infiniteScroll()
                    },
                    fetchData() {
                        this.loading = true
                        axios({
                            method: 'get',
                            url: '{{ route('articles') }}',
                            params: {
                                page: this.page + 1,
                                letter: this.letter,
                                search: this.search
                            }
                        }).then(resp => {
                            this.data = this.data.concat(resp.data.data)
                            this.page = resp.data.current_page
                            this.last_page = resp.data.last_page
                        }).finally(() => this.loading = false)
                    },
                    infiniteScroll() {
                        const ctx = this
                        this.triggerElement = document.querySelector('#infinite-scroll-trigger')

                        if (!('IntersectionObserver' in window) ||
                            !('IntersectionObserverEntry' in window) ||
                            !('isIntersecting' in window.IntersectionObserverEntry.prototype) ||
                            !('intersectionRatio' in window.IntersectionObserverEntry.prototype))
                        {
                            // Loading polyfill since IntersectionObserver is not available
                            this.isObserverPolyfilled = true

                            // Storing function in window so we can wipe it when reached last page
                            window.alpineInfiniteScroll = {
                                scrollFunc() {
                                    const position = ctx.triggerElement.getBoundingClientRect()

                                    if(position.top < window.innerHeight && position.bottom >= 0) {
                                        ctx.fetchData()
                                    }
                                }
                            }

                            window.addEventListener('scroll', window.alpineInfiniteScroll.scrollFunc)
                        } else {
                            // We can access IntersectionObserver
                            this.observer = new IntersectionObserver(function(entries) {
                                if(entries[0].isIntersecting === true) {
                                    ctx.fetchData()
                                }
                            }, { threshold: [0] })

                            this.observer.observe(this.triggerElement)
                        }
                    }
                }))
            })
        </script>
    @endpush
</x-app-layout>
