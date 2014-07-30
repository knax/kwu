<?php

class Data extends \Eloquent {

	protected $guarded = ['id'];

    protected $table = 'data';


    public function getNameDescription() {
        return self::getNameDescriptionByName($this->type());
    }

    public static function getNameDescriptionByName($name) {
        return Setting::get('subtype.' . $name);
    }

    public function getAdditionalDataTableHeader() {
        return self::getAdditionalDataTableHeaderByName($this->type());
    }

    public static function getAdditionalDataTableHeaderByName($name) {
        return Setting::get('subtype.' . strtoupper($name) . '.header');
    }

    public function getPageHeader() {
        return self::getPageHeaderByName($this->type());
    }

    public static function getPageHeaderByName($name) {
        $name = strtoupper($name);
        return ['fullname' => Setting::get('subtype.' . $name . '.fullname'), 'name' => '(' . $name .')'];
    }

    public static function getListOfDataAsTable($data) {
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

    public function type()
    {
        return explode('/', $this->no)[1];
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