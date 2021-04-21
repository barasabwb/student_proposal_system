<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProposalProgress extends Model
{
    protected $fillable = [
        'file_name',
        'file_path',
        'username',
        'revisions',
        'thesis'

    ];


}
