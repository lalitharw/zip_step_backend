<?php

namespace App\Services;

class ActivitySyncService
{
    public function activities(){
        $activities = auth()->user()->activities()->with("pauses")->orderBy("id")->simplePaginate(100);
        return [
            "activities" => $activities
        ];
    }

    public function points(int $activity_id){
        $points = auth()->user()->points()->where("activity_id",$activity_id)->orderBy("point_added")->orderBy("id")->cursorPaginate(1000);
        return [
            "points" => $points
        ];
    }


}