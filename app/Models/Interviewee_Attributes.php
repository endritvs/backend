<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\interviewee_types;

class Interviewee_Attributes extends Model
{
    use HasFactory;

    public function interviewee_types()
    {
        return $this->hasOne(interviewee_types::class);
    }
}