<?php

class Record extends Eloquent {

    protected $fillable = array(
        'active',
        'name',
        'logger_id',
        'record_type_id',
        'command',
        'multiplier',
        'description',
        'unit_id',
        'graph_y_lower',
        'graph_y_upper',
    );

    public $rules = array(
        'active' => 'required',
        'name' => 'required',
        'logger_id' => 'required',
        'record_type_id' => 'required',
        'unit_id' => 'required',
    );

    public function isValid()
    {

        $validation = Validator::make($this->attributes, $this->rules);

        if ($validation->passes())
        {
            return true;
        }

        $this->errors = $validation->messages();

        return false;

    }

    public function amps()
    {
        return $this->hasMany('Amp');
    }

    public function volts()
    {
        return $this->hasMany('Volt');
    }

    public function temperatures()
    {
        return $this->hasMany('Temperature');
    }

    public function logger()
    {
        return $this->belongsTo('Logger');
    }

    public function record_type()
    {
        return $this->belongsTo('Record_type');
    }

    public function unit()
    {
        return $this->belongsTo('Unit');
    }

}
