<?php

namespace App\Services;
use App\Models\ActivityPause;


class ActivityPauseService {

    public function store(array $data){
        $activity = auth()->user()->activities()->findOrFail($data['activity_id']);
        
        foreach($data['pauses'] as $pause){
            $activity->pauses()->updateOrCreate(
                [
                    "client_id" => $pause['client_id']
                ],
                [
                    "activity_id" => $data['activity_id'],
                    "pause_at" => $pause['pause_at'],
                    "resume_at" => $pause["resume_at"] ?? null
                ]
            );
        }

        return [
            "success" => true
        ];
    }

    public function delete(int $activity_id){
        auth()->user()->activityPauses()->where("activity_id",$activity_id)->delete();
    }
}