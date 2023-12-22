<x-admin-layout>
    <div class="py-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <div class="w-full mb-1">
            <div class="mb-4 px-4">
                @if($article)
                    {{ Breadcrumbs::render('articles-edit', $article) }}
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Edit Article</h1>
                @else
                    {{ Breadcrumbs::render('articles-create') }}
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Create Article</h1>
                @endif
            </div>

            @if($article)
                <form class="px-4 relative bg-white rounded-lg dark:bg-gray-800" action="{{ route('admin.articles.edit', $article->slug) }}" method="post" enctype="multipart/form-data">
                    @csrf @method('put')
            @else
                <form class="px-4 relative bg-white rounded-lg dark:bg-gray-800" action="{{ route('admin.articles') }}" method="post" enctype="multipart/form-data">
                    @csrf
            @endif
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                            <input type="text" name="title" id="title" value="{{ $article?->title ?? old('title') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Article Title" required>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                            <input type="file" accept="image/*" name="image" id="image" class="block max-w-md w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" {{ $article ? '' : 'required' }}>
                        </div>
                        <div class="mt-1 col-span-12 sm:col-span-12">
                            @if ($article)
                                {!! $article->trix('content') !!}
                            @else
                                @trix(\App\Models\Article::class, 'content')
                            @endif
                        </div>
                    </div>

                    <div class="items-center mt-6">
                        <input type="submit" name="publish" value="Submit" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center hover:cursor-pointer dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" />
                        <input type="submit" name="publish" value="Save as Draft" class="ml-1 hover:cursor-pointer text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" />
                    </div>
                </form>
        </div>
    </div>
</x-admin-layout>
