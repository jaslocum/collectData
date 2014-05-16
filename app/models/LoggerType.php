<?php

class LoggerType extends Eloquent {

    protected $fillable = array(
        'name',
        'description',
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

    public function loggers()
    {
        return $this->hasMany('Logger')->orderBy('name');
    }

}
