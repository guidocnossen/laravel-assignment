<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use App\Models\User;
use App\Models\Image; 

class House extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'type', 'surface', 'rooms', 'price', 'status'
    ];


    public function images()
    {
    	return $this->hasMany(Image::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class); 
    }

}
