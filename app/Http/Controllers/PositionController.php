<?php

namespace App\Http\Controllers;

use App\Http\Requests\PositionRequest;
use App\Http\Resources\Position\PositionCollection;
use App\Http\Resources\Position\PositionResource;
use App\Services\PositionService;

class PositionController extends Controller
{
    public function __construct(protected PositionService $positionService) {}

    public function index()
    {
        $data = $this->positionService->getPositions();

        if ($data->isEmpty()) {
            return apiResponce(404, 'Not Found');
        }

        return apiResponce(200, 'Success', new PositionCollection($data));
    }

    public function store(PositionRequest $request)
    {
        $data = $request->validated();

        $model = $this->positionService->store($data);

        if (! $model) {
            return apiResponce(400, 'Bad Request');
        }

        return apiResponce(200, 'Success', PositionResource::make($model));
    }

    public function show($id)
    {
        $model = $this->positionService->getPosition($id);

        if (! $model) {
            return apiResponce(404, 'Not Found');
        }

        return apiResponce(200, 'Success', PositionResource::make($model));
    }

    public function update(PositionRequest $request, $id)
    {
        $data = $request->validated();

        if (! $this->positionService->update($data, $id)) {
            return apiResponce(400, 'Bad Request');
        }

        $model = $this->positionService->getPosition($id);

        if (! $model) {
            return apiResponce(404, 'Not Found');
        }

        return apiResponce(200, 'Success', PositionResource::make($model));
    }

    public function destroy($id)
    {
        if (! $this->positionService->delete($id)) {
            return apiResponce(400, 'Bad Request');
        }

        return apiResponce(200, 'Success');
    }
}
