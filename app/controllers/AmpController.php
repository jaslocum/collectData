<?php

class AmpController extends BaseController {

    protected $amp;

    public function __construct (Amp $amp)
    {
        $this->tz = new DateTimeZone("America/New_York");
        $this->amp = $amp;
        $this->date = new DateTime("now", $this->tz);
        $this->hourAgo = new DateTime("now", $this->tz);
        $this->hourAgo->setTimestamp($this->date->getTimestamp()-3600);
    }

	public function index()
    {
        $d1 = Input::has('d1') ? Input::get('d1') : $this->date->format('m/d/Y h:i A');
        $d1MySQL = date("Y-m-d H:i:s", strtotime($d1));
        $records = RecordType::where('name','amp')->first()->records->lists('name','id');
        $r1 = Input::has('r1') ? Input::get('r1') : key($records);
        $amps =
            $this->amp->
                where('record_id',$r1)->
                where('created_at','<=',$d1MySQL)->
                orderBy('id','DESC')->
                take(60)->
                with('record')->
                get();

        return View::make('amps.index', array('amps'=>$amps, 'd1'=>$d1, 'records'=>$records, 'r1'=>$r1));
	}

    public function edit($id)
    {
        $amp = $this->amp->whereId($id)->with('record')->first();
        $records = Record::orderBy('name', 'ASC')->lists('name','id');
        return View::make('amps.edit', array('amp'=>$amp, 'records'=>$records));
    }

    public function update($id)
    {

        $amp = $this->amp->whereId($id)->first();

        if (! $amp->fill(Input::all())->isValid())
        {
            return Redirect::back()->withInput()->withErrors($amp->errors);
        }

        $amp->save();

        return Redirect::to(Input::get('returnURL'));
    }
}