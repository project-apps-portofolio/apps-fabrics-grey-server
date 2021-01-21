<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Fabric;
use App\Models\Schedules;
use Carbon\Carbon;

class Machine extends Model {

    protected $table = 'machines';
    // protected $guard = [
    //     'id'
    // ];

    protected $fillable = [
        'name',
        'short_name',
        'type_machine',
    ];

    public function setCreatedAtAttribute($value)
    {
     if($value) {
         $this->attributes['created_at'] = $value;
     } else {
         $this->attributes['created_at'] = null;
     }
    }

    public function getCreatedAtAttribute() {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->tz('Asia/Jakarta')->format('d-m-Y');
    }

    public function getUpdatedAtAttribute() {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->tz('Asia/Jakarta')->format('d-m-Y');
    }


    public function fabric() {
        return $this->hasMany(Fabric::class);
    }

    public function schedule() {
        return $this->hasMany(Schedules::class);
    }

    public function scopeMachineJson($query) {
        return $query->select('*')->get();
    }

    public function scopeMachineJsonId($query, $id) {
        return $query->select('*')->where('id', $id)->first();
    }
    
}
