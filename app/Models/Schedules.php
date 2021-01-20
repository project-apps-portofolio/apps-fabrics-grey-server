<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Fabric;
use Carbon\Carbon;

class Schedules extends Model {

    protected $table = 'schedules';

    protected $fillable = [
        'date',
        'owner_id',
        'title',
        'description',
        'start',
        'end',
        'is_all_day',
        'machine_id',
    ];

    public function scopeScheduleJson($query) {
        return $query->select('*')->get();
    }
    
}
