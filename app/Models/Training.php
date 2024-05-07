<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $fillable = ['empid',  'state', 'date'];

    public function employees()
    {
        return $this->belongsTo(Employee::class);
    }
}
