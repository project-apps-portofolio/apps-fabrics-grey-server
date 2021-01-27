<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Machine;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Customer extends Model {

    // use SoftDeletes;

    protected $table = 'customers';

    protected $fillable = [
        'code',
        'name',
        'nomor_pelanggan',
        'short_name',
        'address',
        'city',
        'post_code',
        'director_name',
        'employee_name',
        'phone',
        'fax',
        'mobile_phone',
    ];

    public function getCreatedAtAttribute() {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->tz('Asia/Jakarta')->format('d-m-Y');
    }

    public function getUpdatedAtAttribute() {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->tz('Asia/Jakarta')->format('d-m-Y');
    }
    
}
