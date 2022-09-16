<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountsAllowed extends Model {
	const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'allowed_accounts';    

    protected $fillable = [
        'id', 'email', 'names','city','job_title'
    ];
    
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'email' => 'string',
        'names' => 'string',
        'city' => 'string',
        'job_title' => 'string'
    ];
    
}
