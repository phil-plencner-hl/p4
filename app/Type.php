<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function events()
    {
        # Type has many Events
        # Define a one-to-many relationship.
        return $this->hasMany('App\Event');
    }

    /**
     * Helper method to get all the types for displaying in a dropdown
     * @return mixed
     */
    public static function getForDropdown()
    {
        return self::orderBy('type')->select(['type', 'id'])->get();
    }
}
