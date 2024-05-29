<?php

namespace App\Http\Controllers;

use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    private FileService $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function getFile($id, $file)
    {
        return response()->download('C:/Users/mauricio.acuna/Documents/Working/avm-2.0/avm-backend/storage/app/files/'.$id.'/'.$file);
    }

    public function storeFile(Request $request){
        $res = $this->fileService->storeFile($request);
        return response()->json($res);
    }
}
