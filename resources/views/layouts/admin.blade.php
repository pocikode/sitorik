@extends('layouts.admin-base')
@section('layout')
    <livewire:admin.layout.navbar />
    <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
        <livewire:admin.layout.sidebar />
        <div class="fixed inset-0 z-10 hidden bg-gray-900/50 dark:bg-gray-900/90" id="sidebarBackdrop"></div>
        <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
            <main>{{ $slot }}</main>
            <livewire:admin.layout.footer />
            <p class="my-10 text-sm text-center text-gray-500">
                &copy;{{ date('Y') }} <a href="https://flowbite.com/" class="hover:underline" target="_blank">Sitorik.xyz</a>. All rights reserved.
            </p>
        </div>

    </div>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/datepicker.min.js"></script>
@endpush
