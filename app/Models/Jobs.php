<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Machine;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Jobs extends Model {

    // use SoftDeletes;

    protected $table = 'jobs';

    protected $fillable = [
        'process_number',
        'po_number',
    ];

    public function getCreatedAtAttribute() {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->tz('Asia/Jakarta')->format('d-m-Y');
    }

    public function getUpdatedAtAttribute() {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->tz('Asia/Jakarta')->format('d-m-Y');
    }
    
}
