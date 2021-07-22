<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
	use SoftDeletes;
     protected $fillable = ['ticket_name', 'ctgT_id', 'description', 'price', 'start_sale', 'end_sale', 'start_time', 'end_time', 'ticket_photo', 'quantity', 'status', 'event_id'];
}
