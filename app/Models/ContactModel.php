<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    use HasFactory;

    protected $table = "contacts";

    protected $fillable = [
        'number_type_id',
        'user_id',
        'number'
    ];

    public function numberTypes(){
        return $this->belongsTo(NumberTypesModel::class, 'number_type_id', 'id');
    }

    public function users(){
        return $this->belongsTo(UserInformationModel::class, 'user_id', 'id');
    }
}
