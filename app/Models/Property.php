<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $guarded = ['id'];

    public function propertycategory()
    {
        return $this->belongsTo(PropertyCategory::class, 'category_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'id');
    }

    public function propertytype()
    {
        return $this->belongsTo(Location::class, 'propertytype_id', 'id');
    }
}
