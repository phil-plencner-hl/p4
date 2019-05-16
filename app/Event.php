<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    public function comments()
    {
        # Event has many Comments
        # Define a one-to-many relationship.
        return $this->hasMany('App\Comment');
    }

    public function type()
    {
        # Event belongs to Type
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Type');
    }
}
