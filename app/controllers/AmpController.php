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

        $post = Request::all();
        $d1 = (isset($post['d1'])? $post['d1'] : $this->hourAgo->format('m/d/Y h:i A'));
        $d2 = (isset($post['d2'])? $post['d2'] : $this->date->format('m/d/Y h:i A'));
        $d1MySQL = date("Y-m-d H:i:s", strtotime($d1));
        $d2MySQL = date("Y-m-d H:i:s", strtotime($d2));
        $records = recordList('amp');
        $r1 = (isset($post['r1'])? $post['r1'] : key($records));
        $amps =
            $this->amp->
            where('time','>=',$d1MySQL)->
            where('time','<=',$d2MySQL)->
            where('record_id','=',$r1)->
            orderBy('id','DESC')->
            take(60)->
            with('record')->
            get();

		return View::make('amps.index', array('amps'=>$amps, 'd1'=>$d1, 'd2'=>$d2, 'records'=>$records, 'r1'=>$r1));
	}

    public function edit($id)
    {
        $amp = $this->amp->with('record')->whereId($id)->first();
        $records = Record::orderBy('name', 'ASC')->lists('name','id');
        return View::make('amps.edit', array('amp'=>$amp, 'records'=>$records));
    }

    public function update($id)
    {
        $post = Request::all();
        $amp = $this->amp->whereId($id)->first();

        if (! $amp->fill(Input::all())->isValid())
        {
            return Redirect::back()->withInput()->withErrors($amp->errors);
        }

        $amp->save();

        return Redirect::to($post['returnURL']);
    }
}