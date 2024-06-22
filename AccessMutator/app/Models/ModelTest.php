<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelTest extends Model
{
    use HasFactory;
    public $table = "employee";

    public function getMobileAttribute($value)
    {
        return substr($value, 0, 5) . "*****";
    }

    public function setMobileAttribute($value)
    {
        $this->attributes['mobile'] = "+91" . $value;
    }
}
