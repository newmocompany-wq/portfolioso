<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResearchRequest;
use App\Http\Resources\Research\ResearchCollection;
use App\Http\Resources\Research\ResearchResource;
use App\Services\ResearchService;

class ResearchController extends Controller
{
    public function __construct(protected ResearchService $researchService) {}

    public function index()
    {
        $data = $this->researchService->getResearches();

        if ($data->isEmpty()) {
            return apiResponce(404, 'Not Found');
        }

        return apiResponce(200, 'Success', new ResearchCollection($data));
    }

    public function store(ResearchRequest $request)
    {
        $data = $request->validated();

        $model = $this->researchService->store($data);

        if (! $model) {
            return apiResponce(400, 'Bad Request');
        }

        return apiResponce(200, 'Success', ResearchResource::make($model));
    }

    public function show($id)
    {
        $model = $this->researchService->getResearch($id);

        if (! $model) {
            return apiResponce(404, 'Not Found');
        }

        return apiResponce(200, 'Success', ResearchResource::make($model));
    }

    public function update(ResearchRequest $request, $id)
    {
        $data = $request->validated();

        if (! $this->researchService->update($data, $id)) {
            return apiResponce(400, 'Bad Request');
        }

        $model = $this->researchService->getResearch($id);

        if (! $model) {
            return apiResponce(404, 'Not Found');
        }

        return apiResponce(200, 'Success', ResearchResource::make($model));
    }

    public function destroy($id)
    {
        if (! $this->researchService->delete($id)) {
            return apiResponce(400, 'Bad Request');
        }

        return apiResponce(200, 'Success');
    }
}
