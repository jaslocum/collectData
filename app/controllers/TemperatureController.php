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
        $d1 = Input::has('d1') ? Input::get('d1') : $this->date->format('m/d/Y h:i A');
        $d1MySQL = date("Y-m-d H:i:s", strtotime($d1));
        $records = RecordType::where('name','temperature')->first()->records->lists('name','id');
        $r1 = Input::has('r1') ? Input::get('r1') : key($records);
        $temperatures =
            $this->temperature->
            where('record_id',$r1)->
            where('created_at','<=',$d1MySQL)->
            orderBy('id','DESC')->
            take(60)->
            with('record')->
            get();
        foreach ($temperatures as $temperature){
            $temperature->editRoutes = "window.location='".route('temperatures.edit',$temperature->id)."'";
        }
		return View::make('temperatures.index', array('temperatures'=>$temperatures, 'd1'=>$d1, 'records'=>$records, 'r1'=>$r1));
	}

    public function edit($id)
    {
        $temperature = $this->temperature->whereId($id)->with('record')->first();
        $records = Record::orderBy('name', 'ASC')->lists('name','id');
        return View::make('temperatures.edit', array('temperature'=>$temperature, 'records'=>$records));
    }

    public function update($id)
    {

        $temperature = $this->temperature->whereId($id)->first();

        if (! $temperature->fill(Input::all())->isValid())
        {
            return Redirect::back()->withInput()->withErrors($temperature->errors);
        }

        $temperature->save();

        return Redirect::to(Input::get('returnURL'));
    }
}