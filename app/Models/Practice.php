<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Practice extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'logo',
        'website_url'
    ];

    /**
     * Get employees with this practice
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
