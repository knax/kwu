<?php

class SWOList extends \Eloquent {

	protected $guarded = ['id'];

    protected $table = 'swo_list';

	public function swoData()
    {
        return $this->belongsTo('SWO', 'swo_id');
    }
}