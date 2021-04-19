<?php

namespace App\students;

use App\SupervisorComments;
use App\students\Revision;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'file_name',
        'file_path',
        'username',
        'revisions',
        'thesis'


    ];

    public function revisions(){
        return $this->hasMany(Revision::class);

}
     public function comments(){
         return $this->hasMany(SupervisorComments::class);

    }
public function addRevision(){

}
public function addComment(){

}
}
