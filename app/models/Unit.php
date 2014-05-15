<?php

class Unit extends Eloquent {

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

    public function records()
    {
        return $this->hasMany('Record')->orderBy('name');
    }

}
