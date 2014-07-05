<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;

class User extends Eloquent implements UserInterface {

	public $guarded = ['id'];

	use UserTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function createdSWO()
    {
        return $this->hasMany('SWO', 'requester_id');
    }

   	public function createdMRF()
    {
        return $this->hasMany('MRF', 'requester_id');
    }

    public function admin()
    {
        return $this->hasOne('Admin');
    }
}
