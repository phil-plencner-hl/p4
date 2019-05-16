<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function event()
    {
        # Comment belongs to Event
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Event');
    }
}
