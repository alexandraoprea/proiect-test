<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitat extends Model
{
    use HasFactory;

    protected $table = 'invitati';

    protected $fillable = [
        'invitation_id',
        'name', 
        'confirmation',
        'food_prefferences',
        'need_accommodation',
        'adults_number',
        'kids_number'
    ];
}
