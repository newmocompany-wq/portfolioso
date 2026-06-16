<?php

namespace App\Http\Controllers;

use App\Http\Requests\LectureRequest;
use App\Http\Resources\Lecture\LectureCollection;
use App\Http\Resources\Lecture\LectureResource;
use App\Services\LectureService;

class LectureController extends Controller
{
    public function __construct(protected LectureService $lectureService) {}

    public function index()
    {
        $data = $this->lectureService->getLectures();

        if ($data->isEmpty()) {
            return apiResponce(404, 'Not Found');
        }

        return apiResponce(200, 'Success', new LectureCollection($data));
    }

    public function store(LectureRequest $request)
    {
        $data = $request->validated();

        $model = $this->lectureService->store($data);

        if (! $model) {
            return apiResponce(400, 'Bad Request');
        }

        return apiResponce(200, 'Success', LectureResource::make($model));
    }

    public function show($id)
    {
        $model = $this->lectureService->getLecture($id);

        if (! $model) {
            return apiResponce(404, 'Not Found');
        }

        return apiResponce(200, 'Success', LectureResource::make($model));
    }

    public function update(LectureRequest $request, $id)
    {
        $data = $request->validated();

        if (! $this->lectureService->update($data, $id)) {
            return apiResponce(400, 'Bad Request');
        }

        $model = $this->lectureService->getLecture($id);

        if (! $model) {
            return apiResponce(404, 'Not Found');
        }

        return apiResponce(200, 'Success', LectureResource::make($model));
    }

    public function destroy($id)
    {
        if (! $this->lectureService->delete($id)) {
            return apiResponce(400, 'Bad Request');
        }

        return apiResponce(200, 'Success');
    }
}
