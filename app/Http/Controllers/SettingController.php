<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Http\Resources\Setting\SettingResource;
use App\Services\SettingService;

class SettingController extends Controller
{
    public function __construct(protected SettingService $settingService) {}

    public function index()
    {
        $setting = $this->settingService->getFirstSetting();

        if (! $setting) {
            return apiResponce(404, 'Not Found');
        }

        return apiResponce(200, 'Success', SettingResource::make($setting));
    }

    public function store(SettingRequest $request)
    {
        $data = $request->validated();

        $setting = $this->settingService->store($data);

        if (! $setting) {
            return apiResponce(400, 'Bad Request');
        }

        return apiResponce(200, 'Success', SettingResource::make($setting));
    }

    public function update(SettingRequest $request)
    {
        $data = $request->validated();

        if (! $this->settingService->update($data)) {
            return apiResponce(400, 'Bad Request');
        }

        $setting = $this->settingService->getFirstSetting();

        if (! $setting) {
            return apiResponce(404, 'Not Found');
        }

        return apiResponce(200, 'Success', SettingResource::make($setting));
    }
}
