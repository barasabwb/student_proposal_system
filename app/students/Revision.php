<?php

namespace App\students;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    protected $fillable = [
        'original_file_id',
        'revision_file',
        'revision_name',
        'revision_comment'


    ];

    public function files(){
        return $this->belongsTo(File::class);
    }
}
