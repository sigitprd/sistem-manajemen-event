<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
	use SoftDeletes;
    protected $fillable = ['event_name', 'event_address', 'description', 'start_date', 'end_date', 'ctgE_id', 'event_photo', 'terms_condition', 'support_doc', 'npwp', 'status', 'eo_id'];
}
