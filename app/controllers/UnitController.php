<?php

class UnitController extends \BaseController {

    public function __construct (Unit $unit)
    {
        $this->unit = $unit;
    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//list units
        $units = $this->unit->orderBy('name')->get();
        return View::make('units.index',array('units'=>$units));
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
        $unit = $this->unit->whereId($id)->first();
        return View::make('units.edit', array('unit'=>$unit));
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
        $unit = $this->unit->whereId($id)->first();

        if (! $unit->fill(Input::all())->isValid())
        {
            return Redirect::back()->withInput()->withErrors($unit->errors);
        }

        $unit->save();

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
