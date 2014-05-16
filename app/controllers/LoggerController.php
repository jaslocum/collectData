<?php

class LoggerController extends \BaseController {

    public function __construct (Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{
		// list loggers
        $loggers = $this->logger->orderBy('name')->with('loggerType')->get();
        return View::make('loggers.index',array('loggers'=>$loggers));
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
        $logger = $this->logger->whereId($id)->first();
        $loggerTypes = LoggerType::orderBy('name')->get()->lists('name','id');
        return View::make('loggers.edit', array('logger'=>$logger, 'loggerTypes'=>$loggerTypes));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

        $logger = $this->logger->whereId($id)->first();

        if (! $logger->fill(Input::all())->isValid())
        {
            return Redirect::back()->withInput()->withErrors($logger->errors);
        }

        $logger->save();

        return Redirect::to(Input::get('returnURL'));
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
