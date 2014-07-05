<?php

class MRF extends \Eloquent {

	protected $guarded = ['id'];

    protected $table = 'mrf';

	public function lists()
    {
        return $this->hasMany('MRFList');
    }

    public function requester()
    {
        return $this->belongsTo('User', 'requester_id', 'id');
    }

    public function approver()
    {
        return $this->belongTo('User', 'approver_id', 'id');
    }
}