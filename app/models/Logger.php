<?php

class Logger extends Eloquent {

    protected $fillable = array(
        'name',
        'description',
        'logger_type_id',
        'ip_address',
        'port'
    );

    public $rules = array(
        'name' => 'required',
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

    public function records()
    {
        return $this->hasMany('Record')->orderBy('name');
    }

    public function loggerType()
    {
        return $this->belongsTo('LoggerType');
    }

}
