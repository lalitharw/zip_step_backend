<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ActivityPauseService;
use App\Http\Requests\Api\ActivityPauseStoreRequest;
use App\Trait\Api\ResponseTrait;

class ActivityPauseController extends Controller
{
    use ResponseTrait;
    protected ActivityPauseService $activityPauseService;
    public function __construct(ActivityPauseService $activityPauseService){
        $this->activityPauseService = $activityPauseService;
    }

    public function store(ActivityPauseStoreRequest $request){
        $data = $request->validated();
        $result = $this->activityPauseService->store($data);
        return $this->successResponse(data: $result, message: "Activity Pause Created");
    }

    public function delete(Request $request)
    {
        $this->activityPauseService->delete($request->activity_id);
        return $this->successResponse(message:"Activity Pauses Deleted Successfully!");
    }
}
