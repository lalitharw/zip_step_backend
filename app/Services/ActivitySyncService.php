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
        $activity = auth()->user()->activities()->findOrFail($activity_id);
        $points = $activity->points()->OrderBy("id")->cursorPaginate(100);
        
        return [
            "points" => $points
        ];
    }
}