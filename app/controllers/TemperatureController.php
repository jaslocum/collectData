<?php

class TemperatureController extends BaseController {

    protected $amp;

    public function __construct (Temperature $temperature)
    {
        $this->tz = new DateTimeZone("America/New_York");
        $this->temperature = $temperature;
        $this->date = new DateTime("now", $this->tz);
        $this->hourAgo = new DateTime("now", $this->tz);
        $this->hourAgo->setTimestamp($this->date->getTimestamp()-3600);
    }

	public function index()
    {

        $post = Request::all();
        $d1 = (isset($post['d1'])? $post['d1'] : $this->hourAgo->format('m/d/Y h:i A'));
        $d2 = (isset($post['d2'])? $post['d2'] : $this->date->format('m/d/Y h:i A'));
        $d1MySQL = date("Y-m-d H:i:s", strtotime($d1));
        $d2MySQL = date("Y-m-d H:i:s", strtotime($d2));
        $records = Record::orderBy('name', 'ASC')->lists('name','id');
        $r1 = (isset($post['r1'])? $post['r1'] : key($records));
        $temperatures =
            $this->temperature->
            where('time','>=',$d1MySQL)->
            where('time','<=',$d2MySQL)->
            where('record_id','=',$r1)->
            orderBy('id','DESC')->
            take(60)->
            with('record')->
            get();

		return View::make('temperatures.index', array('temperatures'=>$temperatures, 'd1'=>$d1, 'd2'=>$d2, 'records'=>$records, 'r1'=>$r1));
	}

    public function edit($id)
    {
        $temperature = $this->temperature->with('record')->whereId($id)->first();
        $records = Record::orderBy('name', 'ASC')->lists('name','id');
        return View::make('temperatures.edit', array('temperature'=>$temperature, 'records'=>$records));
    }

    public function update($id)
    {
        $post = Request::all();
        $temperature = $this->temperature->whereId($id)->first();

        if (! $temperature->fill(Input::all())->isValid())
        {
            return Redirect::back()->withInput()->withErrors($temperature->errors);
        }

        $temperature->save();

        return Redirect::to($post['returnURL']);
    }
}