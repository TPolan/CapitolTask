<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
    ];

    protected $guarded = [
        'job_code'
    ];
    public $timestamps = true;

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }
}
