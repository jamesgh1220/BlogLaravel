<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';

    public function user() {
        return $this->belongsTo('App\User', 'user_id'); /** (Modelo User, Campo de esta tabla) */
    }

    public function categories() {
        return $this->belongsTo('App\Category', 'category_id'); /** (Modelo User, Campo de esta tabla) */
    }
}
