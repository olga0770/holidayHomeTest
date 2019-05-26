<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage(){
        $imagePath = ($this->image) ?  $this->image : 'profile/tf9DZ8NjrYdQL9ZhImTio80jOFtTHq3bZmM9jSAs.png';
        return '/storage/' . $imagePath;

        //$imagePath = ($this->image) ?  '/storage/' . $this->image : 'svg/user_profile.jpg';
        //return $imagePath;
    }

    public function followers(){
        return $this->belongsToMany(User::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
