<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    protected $table = 'employees';
    public $employess = 'employees';
    protected $fillable = [
        'image',
        'name',
        'phone',
        'id_divisions',
        'position'
    ];
    public function divisions(){
        return $this->belongsTo(Divisions::class);
    }
}
