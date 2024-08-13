<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisions extends Model
{
    use HasFactory;
    protected $table = 'divisions';
    public $divisions = 'divisions';
    protected $fillable = [
        'name'
    ];

    public function employees(){
        return $this->hasMany(Employees::class);
    }
}
