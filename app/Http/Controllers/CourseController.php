<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Http\Resources\Course\CourseCollection;
use App\Http\Resources\Course\CourseResource;
use App\Services\CourseService;

class CourseController extends Controller
{
    public function __construct(protected CourseService $courseService) {}

    public function index()
    {
        $data = $this->courseService->getCourses();

        if ($data->isEmpty()) {
            return apiResponce(404, 'Not Found');
        }

        return apiResponce(200, 'Success', new CourseCollection($data));
    }

    public function store(CourseRequest $request)
    {
        $data = $request->validated();

        $model = $this->courseService->store($data);

        if (! $model) {
            return apiResponce(400, 'Bad Request');
        }

        return apiResponce(200, 'Success', CourseResource::make($model));
    }

    public function show($id)
    {
        $model = $this->courseService->getCourse($id);

        if (! $model) {
            return apiResponce(404, 'Not Found');
        }

        return apiResponce(200, 'Success', CourseResource::make($model));
    }

    public function update(CourseRequest $request, $id)
    {
        $data = $request->validated();

        if (! $this->courseService->update($data, $id)) {
            return apiResponce(400, 'Bad Request');
        }

        $model = $this->courseService->getCourse($id);

        if (! $model) {
            return apiResponce(404, 'Not Found');
        }

        return apiResponce(200, 'Success', CourseResource::make($model));
    }

    public function destroy($id)
    {
        if (! $this->courseService->delete($id)) {
            return apiResponce(400, 'Bad Request');
        }

        return apiResponce(200, 'Success');
    }
}
