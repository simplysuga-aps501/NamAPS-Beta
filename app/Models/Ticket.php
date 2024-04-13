<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'submitter_email', 'student_email', 'service_type', 'description', 'ticket_status','conversation', 'solution',
    ];

}
