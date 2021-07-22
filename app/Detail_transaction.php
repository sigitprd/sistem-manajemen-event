<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_transaction extends Model
{
    protected $fillable = ['transaction_id', 'ticket_id', 'price', 'quantity'];
}
