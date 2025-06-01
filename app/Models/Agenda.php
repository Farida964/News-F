<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
    ];

    use HasFactory;
}
