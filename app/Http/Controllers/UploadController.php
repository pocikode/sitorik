<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function testUpload(Request $request)
    {
        Storage::put('testing', $request->file('file'));
        return response()->json(['message' => 'success']);
    }
}
