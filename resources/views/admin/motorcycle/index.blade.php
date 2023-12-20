<x-admin-layout>
    <div class="py-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <div class="w-full mb-1">
            <div class="mb-4 px-4">
                {{ Breadcrumbs::render('motorcycles') }}
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All Motorcycles</h1>
            </div>
            <livewire:admin.motorcycle-lists />
        </div>
    </div>

    @include('admin.motorcycle.delete')
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const deleteBtnModal = document.querySelectorAll('[data-modal-target="delete-modal"]')
                deleteBtnModal.forEach(function (btn) {
                    btn.addEventListener('click', function () {
                        const modelName = this.getAttribute('data-name')
                        const slug = this.getAttribute('data-slug')

                        const form = document.getElementById('deleteForm')
                        form.setAttribute('action', `{{ route('admin.motorcycles') }}/${slug}`)

                        document.getElementById('modelToDelete').innerText = modelName
                        console.log('clicked')
                    })
                })
            })
        </script>
    @endpush
</x-admin-layout>
