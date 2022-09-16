<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Functions extends Model
{
    //

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    
    protected $table = 'functions';

    protected $fillable = [
        'job_title','description', 'time', 'type','order','evaluation_id'
    ];
    
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'job_title' => 'string',
        'description' => 'string',
        'time' => 'string',
        'type' => 'string',
        'order' => 'integer',
        'evaluation_id' => 'integer'
    ];
    

    public function evaluation()
    {
        return $this->belongsTo('App\Models\Evaluations');
    }
}
