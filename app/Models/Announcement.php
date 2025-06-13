<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table = 'announcement';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'description',
        'info',
        'date',
    ];
    use HasFactory;
}
