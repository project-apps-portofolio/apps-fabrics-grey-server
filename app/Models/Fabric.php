<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Fabric extends Model
{

    protected $table = 'fabrics';

    protected $brand_name = '';
    protected $guarded = [];  

    protected $fillable = [
        'fabric_type',
        'machine_id',
        'brand',
        'po_number',
        'created_at',
    ];

    protected $casts = [
        // 'is_lot_to_lot' => 'boolean',
        // 'is_perbaikan'  => 'boolean',
        // 'show_logo'     => 'boolean',
        // 'point'         => 'integer',
        // 'is_cab'        => 'boolean',
        // 'is_rib'        => 'boolean',
    ];

    protected $rules = [
        // 'sales_order_id'        => 'required',
        // 'lot_number'    => 'required',
        // 'total_weight'  => 'required',
        // 'point'         => 'required_without_all:jenis_kain,custom_point|integer|min:1',
        // 'custom_point'  => 'required_without:point|integer|min:1',
    ];

    public function getCreatedAtAttribute() {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->tz('Asia/Jakarta')->format('d-m-Y');
    }

    public function getUpdatedAtAttribute() {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->tz('Asia/Jakarta')->format('d-m-Y');
    }

    public function scopeFabricJson($query)
    {
        return $query->select('*')->get();
    }

    public function setPoNumberAttribute($value)
    {
        if ($value) {
            $this->attributes['po_number'] = ($value);
        } else {
            $this->attributes['po_number'] = null;
        }
    }

    public function getPoNumberAttribute($value)
    {
        return $value;
    }

    public function setBrandAttibute($value) {
        if($value) {
            $this->attributes['brand'] = 'Brand' + ($value);
        } else {
            $this->attributes['brand'] = null;
        }
    }

    public function getBrandAttibute($value) {
        return $value;
    }

    public function getBrandNameAttribute() {
        return $this->brand;
    }
    
}
