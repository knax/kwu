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

    public function getDataNeedApproval()
    {
    	$departement = $this->type;

		if ($departement == 'superadmin') {
			$departement = '';
		}

		$data = Data::byDepartement($departement)->notApproved()->canBeApproved($this)->get();

  		return $data;
    }
}