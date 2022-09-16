<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    //
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'skills';

    protected $fillable = [
        'skill','type', 'description', 'order','evaluation_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'skill' => 'string',
        'type' => 'string',
        'description' => 'string',
        'order' => 'integer',
        'evaluation_id' => 'integer'
    ];
        

    public function evaluation()
    {
        return $this->belongsTo('App\Models\Evaluations');
    }
}
