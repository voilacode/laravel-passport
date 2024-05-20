<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interaction extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'client_slug',
        'name',
        'phone',
        'interaction_date',
        'interaction_type',
        'interaction_tag',
        'duration',
        'caller_name',
        'caller_phone',
        'status',
        'data',
    ];

}
