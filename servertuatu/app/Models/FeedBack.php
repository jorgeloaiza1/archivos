<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model
{
    //
    protected $table = 'feedback';
    protected $fillable = [
        'user_document_evaluated','notes1','notes2','notes3','evaluation_id', 'is_closed'
    ];
    protected $casts = [
        'is_closed' => 'boolean',        
    ];

    public function evaluation()
    {
        return $this->belongsTo('App\Models\Evaluations');
    }    


}
