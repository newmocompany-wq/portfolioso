<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Http\Resources\Blog\BlogCollection;
use App\Http\Resources\Blog\BlogResource;
use App\Services\BlogService;

class BlogController extends Controller
{
    public function __construct(protected BlogService $blogService) {}

    public function index()
    {
        $data = $this->blogService->getBlogs();

        if ($data->isEmpty()) {
            return apiResponce(404, 'Not Found');
        }

        return apiResponce(200, 'Success', new BlogCollection($data));
    }

    public function store(BlogRequest $request)
    {
        $data = $request->validated();

        $model = $this->blogService->store($data);

        if (! $model) {
            return apiResponce(400, 'Bad Request');
        }

        return apiResponce(200, 'Success', BlogResource::make($model));
    }

    public function show($id)
    {
        $model = $this->blogService->getBlog($id);

        if (! $model) {
            return apiResponce(404, 'Not Found');
        }

        return apiResponce(200, 'Success', BlogResource::make($model));
    }

    public function update(BlogRequest $request, $id)
    {
        $data = $request->validated();

        if (! $this->blogService->update($data, $id)) {
            return apiResponce(400, 'Bad Request');
        }

        $model = $this->blogService->getBlog($id);

        if (! $model) {
            return apiResponce(404, 'Not Found');
        }

        return apiResponce(200, 'Success', BlogResource::make($model));
    }

    public function destroy($id)
    {
        if (! $this->blogService->delete($id)) {
            return apiResponce(400, 'Bad Request');
        }

        return apiResponce(200, 'Success');
    }
}
