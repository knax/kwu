<?php

class Data extends \Eloquent {

	protected $guarded = ['id'];

    protected $table = 'data';

    public function requester()
    {
        return $this->belongsTo('User', 'requester_id', 'id');
    }

    public function approver()
    {
        return $this->belongTo('User', 'approver_id', 'id');
    }

    public function isApproved() {
        return !is_null($this->approver);
    }
}