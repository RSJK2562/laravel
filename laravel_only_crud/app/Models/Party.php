<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    // use HasFactory;

    // Table name
    protected $table = "parties";

    // Primary key
    protected $primaryKey = "id";

    // Fillable columns
    // protected $fillable = array("full_name");
    protected $fillable = array("full_name", "phone_nu", "city", "address");
}
