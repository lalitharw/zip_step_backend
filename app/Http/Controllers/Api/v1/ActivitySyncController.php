<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Trait\Api\ResponseTrait;
use App\Services\ActivitySyncService;


class ActivitySyncController extends Controller
{
    use ResponseTrait;
    protected ActivitySyncService $activitySyncService;

    public function __construct(ActivitySyncService $activitySyncService){
        $this->activitySyncService = $activitySyncService;
    }

    public function activities(Request $request){
        $result = $this->activitySyncService->activities();
        return $this->successResponse(data:$result, message:"Activity Synced Successfully!");
    }

    public function points(Request $request,int $activity_id){
        $result = $this->activitySyncService->points($activity_id);
        return $this->successResponse(data:$result,message:"Activity Point Synced Successfully!");
    }
}
