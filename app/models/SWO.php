<?php

class SWO extends \Eloquent {

	protected $guarded = ['id'];

    protected $table = 'swo';

	public function lists()
    {
        return $this->hasMany('SWOList', 'swo_id');
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