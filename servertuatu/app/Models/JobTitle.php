<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class JobTitle extends Model
{

	const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'job_title';

    protected $fillable = [
        'title'
    ];
    
}
