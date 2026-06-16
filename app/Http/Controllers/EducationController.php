<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducationRequest;
use App\Http\Resources\Education\EducationCollection;
use App\Http\Resources\Education\EducationResource;
use App\Services\EducationService;

class EducationController extends Controller
{
    public function __construct(protected EducationService $educationService) {}

    public function index()
    {
        $data = $this->educationService->getEducations();

        if ($data->isEmpty()) {
            return apiResponce(404, 'Not Found');
        }

        return apiResponce(200, 'Success', new EducationCollection($data));
    }

    public function store(EducationRequest $request)
    {
        $data = $request->validated();

        $model = $this->educationService->store($data);

        if (! $model) {
            return apiResponce(400, 'Bad Request');
        }

        return apiResponce(200, 'Success', EducationResource::make($model));
    }

    public function show($id)
    {
        $model = $this->educationService->getEducation($id);

        if (! $model) {
            return apiResponce(404, 'Not Found');
        }

        return apiResponce(200, 'Success', EducationResource::make($model));
    }

    public function update(EducationRequest $request, $id)
    {
        $data = $request->validated();

        if (! $this->educationService->update($data, $id)) {
            return apiResponce(400, 'Bad Request');
        }

        $model = $this->educationService->getEducation($id);

        if (! $model) {
            return apiResponce(404, 'Not Found');
        }

        return apiResponce(200, 'Success', EducationResource::make($model));
    }

    public function destroy($id)
    {
        if (! $this->educationService->delete($id)) {
            return apiResponce(400, 'Bad Request');
        }

        return apiResponce(200, 'Success');
    }
}
