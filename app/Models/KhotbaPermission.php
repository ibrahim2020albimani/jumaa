<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhotbaPermission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'khotba_id',
    ];
}
