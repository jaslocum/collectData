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
        foreach ($records as $record){
            $record->editRoutes = "window.location='".route('records.edit',$record->id)."'";
        }
        $createRoute = "window.location='".route('records.create')."'";
        return View::make('records.index',
            array(
                'records' => $records,
                'createRoute' => $createRoute
            )
        );
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
    public function create()
    {
        $record = new Record;
        $record->save();
        $id = $record->id;
        $record = $this->record->with('logger')->with('recordType')->with('unit')->whereId($id)->first();
        $recordTypes = RecordType::orderBy('name')->get()->lists('name','id');
        $loggers =Logger::orderBy('name')->get()->lists('name','id');
        $units = Unit::orderBy('name')->get()->lists('name','id');
        $returnURL = route('records.index');
        $deleteURI = route('records.destroy',$record->id);
        return View::make('records.edit',
            array('record'=>$record,
                'recordTypes'=>$recordTypes,
                'loggers'=>$loggers,
                'units'=>$units,
                'returnURL'=>$returnURL,
                'deleteURI'=>$deleteURI
            )
        );
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
        $record = $this->record->with('logger')->with('recordType')->with('unit')->whereId($id)->first();
        $recordTypes = RecordType::orderBy('name')->get()->lists('name','id');
        $loggers =Logger::orderBy('name')->get()->lists('name','id');
        $units = Unit::orderBy('name')->get()->lists('name','id');
        $returnURL = route('records.index');
        $deleteURI = route('records.destroy',$record->id);
        return View::make('records.edit',
            array(
                  'record'=>$record,
                  'recordTypes'=>$recordTypes,
                  'loggers'=>$loggers,
                  'units'=>$units,
                  'returnURL'=>$returnURL,
                  'deleteURI'=>$deleteURI
            )
        );
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $record = $this->record->whereId($id)->first();
        Input::has('active') ? $record->active = '1' : $record->active = '0';

        if (! $record->fill(Input::all())->isValid())
        {
            return Redirect::back()->withInput()->withErrors($record->errors);
        }

        $record->save();

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
        $record = Record::find($id);
        $record->delete();
	}


}
