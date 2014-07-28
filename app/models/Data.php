<?php

class Data extends \Eloquent {

	protected $guarded = ['id'];

    protected $table = 'data';

    public static $tableHeaderList = [
    'No',
    'Requester',
    'Approved'
    ];

    public static $tableHeaderDetails = [
    'swo' => [
    'No',
    'Serial Number',
    'Description',
    'Service Requested'
    ],
    'mrf' => [
    'No',
    'Description',
    'Qty',
    'Unit',
    'Remarks'
    ]
    ];

    public static $nameDescription = [
    'swo' => [
    'full' => 'Service Work Order',
    'abbr' => 'SWO'
    ],
    'mrf' => [
    'full' => 'Material Request Form',
    'abbr' => 'MRF'
    ]
    ];

    public static function getTableByData($data) {
        $tableBody = [];

        foreach ($data as $row) {
            $temp = [
            $row->no,
            $row->requester->full_name,
            ($row->isApproved()) ? Lang::get('general.yes') : Lang::get('general.no')
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

    public function scopeByDepartement($query, $departement = '')
    {
        return $query->where('no', 'like', '%' . $departement .'%');
    }

    public function scopeCanBeApproved($query, $admin)
    {
        $type = $admin->type;

        if ($admin->type == 'superadmin') {
            return $query;
        } else {
            return $query->where('requester_is_admin', '=', false);
        }
    }
}