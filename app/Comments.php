<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    public $table = 'comments';
    public $timestamps = true;

    protected $dates = [
        'created_at', 'updated_at'
    ];

    protected $fillable = [
    	'user_id', 'comments', 'created_at', 'updated_at' 
	];

	public function user()
	{
    	return $this->belongsTo('App\User', 'user_id', 'id');
	}
}
