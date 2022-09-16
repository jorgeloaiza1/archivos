<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluationUser extends Model
{
    //
    protected $table = 'evaluation_user';    

    protected $fillable = [
        'user_id', 'user_document_evaluated','evaluation_id', 'avg_skills','avg_functions'
    ];

    public function evaluation()
    {
        return $this->belongsTo('App\Models\Evaluations');
    }    

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


}
