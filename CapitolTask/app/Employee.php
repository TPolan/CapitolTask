<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
    ];

    protected $guarded = [
        'personal_number'
    ];
    public $timestamps = true;

    public function jobs()
    {
        return $this->belongsToMany(Job::class);
    }
}
