<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumberTypesModel extends Model
{
    use HasFactory;

    protected $table = 'numbers_type';

    protected $fillable = [
        'type'
    ];
}
