@props(['id', 'type' => 'info', 'dismissable' => false, 'border' => false, 'icon' => false])

@php
    $attrs = [
        'info' => [
            'text_color' => 'text-blue-800 dark:text-blue-400',
            'border_color' => 'border-blue-300 dark:border-blue-800',
            'bg_color' => 'bg-blue-50 dark:bg-gray-800',
            'dismiss_color' => 'bg-blue-50 text-blue-500 focus:ring-blue-400 hover:bg-blue-200 dark:text-blue-400',
            'icon' => '<svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9h2v5m-2 0h4M9.408 5.5h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                       </svg>',
        ],
        'success' => [
            'text_color' => 'text-green-800 dark:text-green-400',
            'border_color' => 'border-green-300 dark:border-green-800',
            'bg_color' => 'bg-green-50 dark:bg-gray-800',
            'dismiss_color' => 'bg-green-50 text-green-500 focus:ring-green-400 hover:bg-green-200 dark:text-green-400',
            'icon' => '<svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 10 2 2 4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                       </svg>',
        ],
        'danger' => [
            'text_color' => 'text-red-800 dark:text-red-400',
            'border_color' => 'border-red-300 dark:border-red-800',
            'bg_color' => 'bg-red-50 dark:bg-gray-800',
            'dismiss_color' => 'bg-red-50 text-red-500 focus:ring-red-400 hover:bg-red-200 dark:text-red-400',
            'icon' => '<svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m13 7-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                       </svg>',
        ],
    ];

    $config = $attrs[$type];
@endphp

<div id="{{ $id }}" class="flex items-center p-4 mb-4 rounded-lg {{ $config['text_color'] . ' ' .  $config['bg_color']}} {{ $border ? 'border ' . $config['border_color'] : '' }}" role="alert">
    @if($icon) {!! $config['icon'] !!} @endif
    <span class="sr-only">{{ $type }}</span>
    <div class="ms-3 text-sm font-medium">
        {{ $slot }}
    </div>
    @if($dismissable)
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 {{ $config['dismiss_color'] }} rounded-lg focus:ring-2 p-1.5 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#{{ $id }}" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    @endif
</div>
