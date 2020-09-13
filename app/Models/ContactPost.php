<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPost extends Model
{
    use HasFactory;

    protected $table = 'contactposts';

    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\Model\User');
    }
}
