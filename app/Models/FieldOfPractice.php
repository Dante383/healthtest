<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Practice;

class FieldOfPractice extends Model
{
    use HasFactory;

    protected $table = 'fields_of_practice';

    public function practice()
    {
        return $this->belongsTo(Practice::class);
    } 
}
