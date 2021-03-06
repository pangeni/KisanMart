<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_time', 'end_time'
    ];

    public function collectionSlot(){
        return $this->hasMany(CollectionSlot::class);
    }
}
