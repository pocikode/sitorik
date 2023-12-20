<?php

return [
    'storage_disk' => env('LARAVEL_TRIX_STORAGE_DISK', 's3'),

    'store_attachment_action' => App\Http\Controllers\TrixAttachmentController::class.'@store',

    'destroy_attachment_action' => App\Http\Controllers\TrixAttachmentController::class.'@destroy',
];
