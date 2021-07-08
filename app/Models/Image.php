<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Endownment; 

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'endownment_id', 'url', 'location'
    ];

    public function endownment()
    {
    	return $this->belongsTo(Endownment::class); 
    }
}
