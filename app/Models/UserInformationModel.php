<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformationModel extends Model
{
    use HasFactory;

    protected $table = 'user_informations';

    protected $fillable = [
        'firstname',
        'lastname'
    ];
}
