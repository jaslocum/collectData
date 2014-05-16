<?php

class RecordTypeController extends \BaseController {

    public function __construct (RecordType $recordType)
    {
        $this->recordType = $recordType;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

    public function index()
	{
		//list recordTypes
        $recordTypes = $this->recordType->orderBy('name')->get();
        return View::make('recordTypes.index',array('recordTypes'=>$recordTypes));
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
        $recordType = $this->recordType->whereId($id)->first();
        return View::make('recordTypes.edit', array('recordType'=>$recordType));
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
        $recordType = $this->recordType->whereId($id)->first();

        if (! $recordType->fill(Input::all())->isValid())
        {
            return Redirect::back()->withInput()->withErrors($recordType->errors);
        }

        $recordType->save();

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
