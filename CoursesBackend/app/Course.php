<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($input)
 */
class Course extends Model
{
    protected $fillable = [
        'name', 'description','userId'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
