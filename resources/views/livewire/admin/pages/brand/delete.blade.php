<div class="items-center justify-center overflow-x-hidden overflow-y-auto top-4 md:inset-0 sm:h-full">
    <div class="relative px-4 md:h-auto">
        <!-- Modal content -->
        <form class="relative bg-white rounded-lg shadow text-gray-500 dark:bg-gray-800" wire:submit="delete">
            @csrf
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div class="flex flex-col items-center">
                    <svg class="w-28 h-28 text-yellow-400 dark:text-yellow-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                        <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg>
                    <h3 class="text-xl font-semibold mt-3 dark:text-white">Apakah anda yakin akan menghapus brand {{ $brand->name }}?</h3>
                </div>
                <div class="flex justify-center items-center">
                    <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                    <button type="button" wire:click="$dispatch('closeModal')" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
