<?php

namespace App\Models;

use App\Models\Pricing;
use Illuminate\Database\Eloquent\Model;

class PackageHistory extends Model
{
    protected $guarded = ['id'];

    public function package()
    {
        return $this->belongsTo(Pricing::class, 'package_id', 'id');
    }
}
