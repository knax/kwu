<?php

class MRFList extends \Eloquent {

	protected $guarded = ['id'];

    protected $table = 'mrf_list';

	public function mrf()
    {
        return $this->belongsTo('MRF');
    }
}