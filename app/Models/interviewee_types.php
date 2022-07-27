<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Interviewee_Attributes;

class interviewee_types extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];


    public function interviewee_attributes()
    {
        return $this->belongsTo(Interviewee_Attributes::class);
    }
}