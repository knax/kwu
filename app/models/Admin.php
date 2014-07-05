<?php

class Admin extends \Eloquent {

	protected $guarded = ['id'];

    protected $table = 'admin';

    public function user()
    {
        return $this->belongsTo('User', 'users_id', 'id');
    }

    public function isSuperAdmin() {
    	return $this->type == 'superadmin';
    }
}