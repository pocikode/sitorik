<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Te7aHoudini\LaravelTrix\Models\TrixAttachment;

class TrixAttachmentController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|file',
            'modelClass' => 'required',
            'field' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $path = 'uploads/' . date('Y') . '/' . date('m') . '/' . date('d');
        $attachment = $request->file->storePublicly($path, $request->disk ?? config('laravel-trix.storage_disk'));

        $url = Storage::disk($request->disk ?? config('laravel-trix.storage_disk'))->url($attachment);

        TrixAttachment::create([
            'field' => $request->field,
            'attachable_type' => $request->modelClass,
            'attachment' => $attachment,
            'disk' => $request->disk ?? config('laravel-trix.storage_disk'),
        ]);

        return response()->json(['url' => $url], Response::HTTP_CREATED);
    }

    public function destroy($url): JsonResponse
    {
        $attachment = TrixAttachment::where('attachment', basename($url))->first();
        Storage::disk($request->disk ?? config('laravel-trix.storage_disk'))->delete($url);

        return response()->json(optional($attachment)->purge());
    }
}
