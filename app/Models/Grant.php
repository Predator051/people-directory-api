<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'allow_read',
        'allow_write',
        'allow_history_read',
        'decline_read',
        'decline_write',
        'decline_history_read'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
