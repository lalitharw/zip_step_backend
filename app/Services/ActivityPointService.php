<?php

namespace App\Services;

use App\Models\ActivityPoint;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Carbon;

class ActivityPointService
{

    public function store(array $data)
    {
        
        $now = now();
        $points = [];
        $activity_id = $data['activity_id'];
        
        $points = [];

    foreach ($data["points"] as $point) {
        $points[] = [
            "activity_id" => $activity_id,
            "latitude" => $point["latitude"],
            "longitude" => $point["longitude"],
            "raw_latitude" => $point["raw_latitude"] ?? null,
            "raw_longitude" => $point["raw_longitude"] ?? null,
            "client_id" => $point["client_id"],
            "speed" => $point["speed"],
            "altitude" => $point["altitude"],
            "accuracy" => $point["accuracy"],
            "point_added" => Carbon::parse($point['point_added']),
            "heading" => $point["heading"] ?? null,
            "created_at" => $now,
            "updated_at" => $now,
            "user_id" => auth()->id(),
        ];
    }


    if (!empty($points)) {
        ActivityPoint::upsert(
            $points,
            ["client_id"],
            [
                "latitude",
                "longitude",
                "raw_latitude",
                "raw_longitude",
                "speed",
                "altitude",
                "accuracy",
                "point_added",
                "heading",
                "updated_at",
            ]
        );
    }
        
        return [
            "success" => true
        ];
    }


    public function delete(int $activity_id) {
        auth()->user()->activityPoints()->where("activity_id",$activity_id)->delete();
    }
}
