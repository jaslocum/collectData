<?php

class LoggerTypeController extends \BaseController {

    public function __construct (LoggerType $loggerType)
    {
        $this->loggerType = $loggerType;
    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//list loggerTypes
        $loggerTypes = $this->loggerType->orderBy('name')->get();
        return View::make('loggerTypes.index',array('loggerTypes'=>$loggerTypes));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $loggerType = $this->loggerType->whereId($id)->first();
        return View::make('loggerTypes.edit', array('loggerType'=>$loggerType));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{        
        $post = Request::all();
        $loggerType = $this->loggerType->whereId($id)->first();

        if (! $loggerType->fill(Input::all())->isValid())
        {
            return Redirect::back()->withInput()->withErrors($loggerType->errors);
        }

        $loggerType->save();

        return Redirect::to($post['returnURL']);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
