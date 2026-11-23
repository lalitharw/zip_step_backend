<?php

namespace App\Services;

use App\Models\ActivityPoint;
use Illuminate\Support\Facades\Redis;

class ActivityPointService
{

    public function store(array $data)
    {
        
        $now = now();
        $points = [];
        $activity_id = $data['activity_id'];
        
        foreach($data["points"] as $point){
            if(ActivityPoint::where("client_id",$point['client_id'])->exists()){
                continue;
            }

            $points[] = [
                "activity_id" => $activity_id,
                "latitude" => $point['latitude'],
                "longitude" => $point['longitude'],
                "raw_latitude" => $point['raw_latitude'] ?? null,
                "raw_longitude" => $point['raw_longitude'] ?? null, 
                "client_id" => $point['client_id'],
                "speed" => $point['speed'],
                "altitude" => $point['altitude'],
                "created_at" => $now,
                "updated_at" => $now,
                "user_id" => auth()->user()->id
            ];
           
        }

        ActivityPoint::insert($points);
      
        return [
            "success" => true
        ];
    }


    public function delete(int $activity_id) {
        auth()->user()->activityPoints()->where("activity_id",$activity_id)->delete();
    }
}
