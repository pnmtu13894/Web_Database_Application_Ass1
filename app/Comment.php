<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['content'];

    public function ticket(){
        return $this->belongsTo('App\Ticket');
    }
}
