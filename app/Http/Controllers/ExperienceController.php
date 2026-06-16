<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExperienceRequest;
use App\Http\Resources\Experience\ExperienceCollection;
use App\Http\Resources\Experience\ExperienceResource;
use App\Services\ExperienceService;

class ExperienceController extends Controller
{
    public function __construct(protected ExperienceService $experienceService) {}

    public function index()
    {
        $data = $this->experienceService->getExperiences();

        if ($data->isEmpty()) {
            return apiResponce(404, 'Not Found');
        }

        return apiResponce(200, 'Success', new ExperienceCollection($data));
    }

    public function store(ExperienceRequest $request)
    {
        $data = $request->validated();

        $model = $this->experienceService->store($data);

        if (! $model) {
            return apiResponce(400, 'Bad Request');
        }

        return apiResponce(200, 'Success', ExperienceResource::make($model));
    }

    public function show($id)
    {
        $model = $this->experienceService->getExperience($id);

        if (! $model) {
            return apiResponce(404, 'Not Found');
        }

        return apiResponce(200, 'Success', ExperienceResource::make($model));
    }

    public function update(ExperienceRequest $request, $id)
    {
        $data = $request->validated();

        if (! $this->experienceService->update($data, $id)) {
            return apiResponce(400, 'Bad Request');
        }

        $model = $this->experienceService->getExperience($id);

        if (! $model) {
            return apiResponce(404, 'Not Found');
        }

        return apiResponce(200, 'Success', ExperienceResource::make($model));
    }

    public function destroy($id)
    {
        if (! $this->experienceService->delete($id)) {
            return apiResponce(400, 'Bad Request');
        }

        return apiResponce(200, 'Success');
    }
}
