<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $table = 'competition';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
    ];
    use HasFactory;
}
