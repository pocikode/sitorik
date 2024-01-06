<x-admin-layout>
    <div class="px-4 pt-6">
        <!-- Main widget -->
        <div class="flex items-center justify-center gap-5 py-10">
            <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <div class="flex items-center gap-x-3">
                    <svg class="w-12 h-12 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 20">
                        <path d="M13 20a1 1 0 0 1-.64-.231L7 15.3l-5.36 4.469A1 1 0 0 1 0 19V2a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v17a1 1 0 0 1-1 1Z"/>
                    </svg>
                    <div>
                        <h2 class="font-bold text-2xl text-gray-800 dark:text-white">Brands</h2>
                        <span class="text-gray-800 dark:text-white">{{ $totalBrands }}</span>
                    </div>
                </div>
            </a>
            <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <div class="flex items-center gap-x-3">
                    <svg class="w-12 h-12 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="-3.5 0 24 24"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="m8.632 15.526c-1.162.003-2.102.944-2.106 2.105v4.264.041c0 1.163.943 2.106 2.106 2.106s2.106-.943 2.106-2.106c0-.014 0-.029 0-.043v.002-4.263c-.003-1.161-.944-2.102-2.104-2.106z"></path><path d="m16.263 2.631h-4.053c-.491-1.537-1.907-2.631-3.579-2.631s-3.087 1.094-3.571 2.604l-.007.027h-4c-.581 0-1.053.471-1.053 1.053s.471 1.053 1.053 1.053h4.053c.268.899.85 1.635 1.615 2.096l.016.009c-2.871.867-4.929 3.48-4.947 6.577v5.528c.009.956.781 1.728 1.736 1.737h1.422v-3c0-2.064 1.673-3.737 3.737-3.737s3.737 1.673 3.737 3.737v3h1.421c.957-.008 1.73-.781 1.738-1.737v-5.474c-.001-3.105-2.067-5.726-4.899-6.567l-.048-.012c.782-.471 1.363-1.206 1.625-2.08l.007-.026h4.053c.581-.002 1.051-.472 1.053-1.053-.023-.601-.505-1.083-1.104-1.105h-.002zm-7.632 3.209c-1.163 0-2.106-.943-2.106-2.106s.943-2.106 2.106-2.106 2.106.943 2.106 2.106c.001.018.001.039.001.06 0 1.13-.916 2.046-2.046 2.046-.021 0-.042 0-.063-.001h.003z"></path></g></svg>
                    <div>
                        <h2 class="font-bold text-2xl text-gray-800 dark:text-white">Motorcycles</h2>
                        <span class="text-gray-800 dark:text-white">{{ $totalMotors }}</span>
                    </div>
                </div>
            </a>
            <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <div class="flex items-center gap-x-3">
                    <svg class="w-12 h-12 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                        <path d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2Zm-3 15H4.828a1 1 0 0 1 0-2h6.238a1 1 0 0 1 0 2Zm0-4H4.828a1 1 0 0 1 0-2h6.238a1 1 0 1 1 0 2Z"/>
                        <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z"/>
                    </svg>
                    <div>
                        <h2 class="font-bold text-2xl text-gray-800 dark:text-white">Articles</h2>
                        <span class="text-gray-800 dark:text-white">{{ $totalArticles }}</span>
                    </div>
                </div>
            </a>
        </div>
        <div class="py-20"></div>
    </div>
</x-admin-layout>
