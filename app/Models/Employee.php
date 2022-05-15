<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Practice;

class Employee extends Model
{
    use HasFactory;

    /**
     * Get employee's practice
    */
    public function practice()
    {
        return $this->belongsTo(Practice::class);
    } 
}
