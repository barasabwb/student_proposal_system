<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\students\File;

class SupervisorComments extends Model
{
    protected $fillable = [
        'file_id',
        'supervisor_id',
        'comment',


    ];
    public function files(){
        return $this->belongsTo(File::Class);
    }
}
