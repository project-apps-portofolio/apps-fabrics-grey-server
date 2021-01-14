<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fabric extends Model {

    protected $table = 'fabrics';

    protected $fillabel = [
        ''
    ];
    
    public function scopeFabricJson($query) {
        return $query->select('*')->get();
    }
}
