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
        'thesis',
        'approval'


    ];

    public function revisions(){
        return $this->hasMany(Revision::class);

}
     public function comments(){
         return $this->hasMany(SupervisorComments::class);

    }
}
//public function addRevision($revision_comment,$revision_file,$revision_name){
////    $this->revisions()->create(compact('revision_file','revision_name','revision_comment'));
//    Revision::create([
//        'file_id'=>5,
//        'revision_file' =>$revision_file,
//        'revision_name'=> $revision_name,
//        'revision_comment' => $revision_comment,
//
//
//    ]);
//
//}
//public function addComment(){
//
//}
//}
