<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;


class Post extends Eloquent{

	protected $primaryKey = 'post_id';

	protected $table = 'post';

	protected $fillable = array('descricao', 'data', 'user_id');

	//1 to 1
	public function user(){
		return $this->hasOne('User');
	}
	/*
	//1 to N
	public function tags(){
		return $this->hasMany('Tags');

	}

	//N to N
	public function tags(){
		return $this->belongsToMany('Tags' , 'Post_Tags' , 'post_id', 'tag_id');

	}
	*/

}