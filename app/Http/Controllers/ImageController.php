<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ImageService;

class ImageController extends Controller
{
    private $imageService;

    /**
     * Create a new controller instance.
     *
     * @param ImageService $imageService
     */
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function uploadImage(Request $request)
    {
        return $this->imageService->upload($request);
    }
}
