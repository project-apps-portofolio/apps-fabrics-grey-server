<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class ColorNumber extends Model {

    // use SoftDeletes;

    // use SoftDeletes;

    protected $table = 'color_number';

    protected $fillable = [
        'previous_color_number_id',
        'customer_id',
        'color_ref_id',
        'color_code',
        'color_common_name',
        'is_polyester',
        'fabric_type',
        'total_price',
        'is_standard',
    ];

    public function scopeColorNumberJson($query) {
        return $query->select('*')->get();
    }

    public function ColorNumberSave() {

        $request = request();
        $this->previous_color_number_id = $request->previous_color_number_id;
        $this->customer_id = $request->customer_id;
        $this->color_ref_id = $request->color_ref_id;
        $this->color_code = $request->color_code;
        $this->color_common_name = $request->color_common_name;
        $this->is_polyester = $request->is_polyester;
        $this->fabric_type = $request->fabric_type;
        $this->total_price = $request->total_price;
        $this->is_standard = $request->is_standard;

        $this->save();
    }
    
}
