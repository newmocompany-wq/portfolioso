<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutRequest;
use App\Http\Resources\About\AboutResource;
use App\Services\AboutService;

class AboutController extends Controller
{
    public function __construct(protected AboutService $aboutService) {}

    public function index()
    {
        $about = $this->aboutService->getFirstAbout();

        if (! $about) {
            return apiResponce(404, 'Not Found');
        }

        return apiResponce(200, 'Success', AboutResource::make($about));
    }

    public function store(AboutRequest $request)
    {
        $data = $request->validated();

        $about = $this->aboutService->store($data);

        if (! $about) {
            return apiResponce(400, 'Bad Request');
        }

        return apiResponce(200, 'Success', AboutResource::make($about));
    }

    public function update(AboutRequest $request)
    {
        $data = $request->validated();

        if (! $this->aboutService->update($data)) {
            return apiResponce(400, 'Bad Request');
        }

        $about = $this->aboutService->getFirstAbout();

        if (! $about) {
            return apiResponce(404, 'Not Found');
        }

        return apiResponce(200, 'Success', AboutResource::make($about));
    }
}
