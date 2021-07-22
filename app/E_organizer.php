<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class E_organizer extends Model
{
    // protected $primaryKey = 'id_anggota';
    // protected $dates = ['date_of_birth'];
    protected $fillable = ['name_eo', 'address_eo', 'phone_number_eo', 'identity_card_eo', 'status', 'user_id'];
    // public $timestamps = false;
}
