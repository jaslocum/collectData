<?php

class RecordController extends \BaseController {

    public function __construct (Record $record)
    {
        $this->record = $record;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

    public function index()
	{
        //list records
        $records = $this->record->orderBy('name')->with('logger')->with('recordType')->with('unit')->get();
        return View::make('records.index',array('records'=>$records));
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
        $record = $this->record->orderBy('name')->with('logger')->with('recordType')->with('unit')->whereId($id)->first();
        $recordTypes = RecordType::orderBy('name')->get()->lists('name','id');
        $loggers = Logger::orderBy('name')->get()->lists('name','id');
        $units = Unit::orderBy('name')->get()->lists('name','id');
        return View::make('records.edit',
            array('record'=>$record,
                  'recordTypes'=>$recordTypes,
                  'loggers'=>$loggers,
                  'units'=>$units
            ));
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
        $record = $this->record->whereId($id)->first();

        if (! $record->fill(Input::all())->isValid())
        {
            return Redirect::back()->withInput()->withErrors($record->errors);
        }

        $record->save();

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
