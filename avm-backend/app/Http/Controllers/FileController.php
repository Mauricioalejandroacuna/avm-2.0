<?php

namespace App\Http\Controllers;

use App\Services\FileService;
use App\Http\Requests\StoreFileRequest;

class FileController extends Controller
{

    private FileService $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function getFile($id, $path)
    {
        return response()->download('C:/Users/mauricio.acuna/Documents/Working/avm-2.0/avm-backend/storage/app/files/'.$id.'/'.$path);
    }

    public function storeFile(StoreFileRequest $request){
        $res = $this->fileService->storeFile($request);
        return response()->json($res);
    }
}
