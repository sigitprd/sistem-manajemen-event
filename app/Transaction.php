<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['email_user', 'sub_total_order', 'order_time', 'total_payment', 'status', 'user_id'];
}
