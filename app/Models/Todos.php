<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todos extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'description',
        'created_at',
        'updated_at',
        'completed'
    ];

    protected $table = 'todos';
    protected $guarded = ['id'];
}
