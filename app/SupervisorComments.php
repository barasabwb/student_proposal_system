<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\students\File;

class SupervisorComments extends Model
{
    public function files(){
        return $this->belongsTo(File::Class);
    }
}
