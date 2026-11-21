<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityPoint extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $casts = [
        "co_ordinate_data" => "array"
    ];


    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
