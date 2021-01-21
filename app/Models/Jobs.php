<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Machine;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jobs extends Model {

    // use SoftDeletes;

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

    public function machine() {
        return $this->belongsTo(Machine::class);
    }

    public function scopeScheduleJson($query) {
        return $query->select('*')->get();
    }
    
}
