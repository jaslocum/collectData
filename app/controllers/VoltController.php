<?php

class VoltController extends BaseController {

    protected $amp;

    public function __construct (Volt $volt)
    {
        $this->tz = new DateTimeZone("America/New_York");
        $this->volt = $volt;
        $this->date = new DateTime("now", $this->tz);
        $this->hourAgo = new DateTime("now", $this->tz);
        $this->hourAgo->setTimestamp($this->date->getTimestamp()-3600);
    }

	public function index()
    {
        $d1 = Input::has('d1') ? Input::get('d1') : $this->date->format('m/d/Y h:i A');
        $d1MySQL = date("Y-m-d H:i:s", strtotime($d1));
        $records = RecordType::where('name','volt')->first()->records->lists('name','id');
        $r1 = Input::has('r1') ? Input::get('r1') : key($records);
        $volts =
            $this->volt->
                where('record_id',$r1)->
                where('created_at','<=',$d1MySQL)->
                orderBy('id','DESC')->
                take(60)->
                with('record')->
                get();
        foreach ($volts as $volt){
            $volt->editRoutes = "window.location='".route('volts.edit',$volt->id)."'";
        }
        return View::make('volts.index', array('volts'=>$volts, 'd1'=>$d1, 'records'=>$records, 'r1'=>$r1));
	}

    public function edit($id)
    {
        $volt = $this->volt->whereId($id)->with('record')->first();
        $records = Record::orderBy('name', 'ASC')->lists('name','id');
        return View::make('volts.edit', array('volt'=>$volt, 'records'=>$records));
    }

    public function update($id)
    {

        $volt = $this->volt->whereId($id)->first();

        if (! $volt->fill(Input::all())->isValid())
        {
            return Redirect::back()->withInput()->withErrors($volt->errors);
        }

        $volt->save();

        return Redirect::to(Input::get('returnURL'));
    }
}