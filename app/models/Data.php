<?php

class Data extends \Eloquent {

	protected $guarded = ['id'];

    protected $table = 'data';

    public static $tableHeader = [
    'No',
    'Requester name',
    'Approved'
    ];

    public static function getTableData($data, $type) {
        $tableBody = [];

        foreach ($data->type($type)->get() as $row) {
            $temp = [
            $row->no,
            $row->requester->full_name,
            ($row->isApproved()) ? 'Ya' : 'Tidak'
            ];
            $tableBody[$row->id] = $temp;
        }

        return $tableBody;
    }

    public function isSWO()
    {
        return strpos($this->no, 'SWO') !== false;
    }

    public function isMRF()
    {
        return strpos($this->no, 'MRF') !== false;
    }

    public function scopeType($query, $type) {
        return $query->where('no', 'like', '%' . $type .'%');
    }

    public function getAdditionalDataAsArray() {
        return json_decode($this->additonal_data);
    }

    public function requester()
    {
        return $this->belongsTo('User', 'requester_id', 'id');
    }

    public function approver()
    {
        return $this->belongsTo('User', 'approver_id', 'id');
    }

    public function isApproved() {
        return !is_null($this->approver);
    }

    public function scopeNotApproved($query) {
        return $query->where('approver_id', '=', null);
    }
}