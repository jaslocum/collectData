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
        $loggerTypes = $this->loggerType->orderBy('name')->where('id','<>','0')->get();
        foreach ($loggerTypes as $loggerType){
            $loggerType->editRoutes = "window.location='".route('loggerTypes.edit',$loggerType->id)."'";
        }
        $createRoute = "window.location='".route('loggerTypes.create')."'";
        return View::make('loggerTypes.index',
            array(
                'loggerTypes'=>$loggerTypes,
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
        $loggerType = new LoggerType;
        $loggerType->save();
        $id=$loggerType->id;
        $loggerType = $this->loggerType->whereId($id)->first();
        $returnURL = route('loggerTypes.index');
        $deleteURI = route('loggerTypes.destroy',$loggerType->id);

        return View::make('loggerTypes.edit',
            array(
                'loggerType'=>$loggerType,
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
        $loggerType = $this->loggerType->whereId($id)->first();
        $returnURL = route('loggerTypes.index');
        $deleteURI = route('loggerTypes.destroy',$loggerType->id);
        return View::make('loggerTypes.edit',
            array(
                'loggerType'=>$loggerType,
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

        $loggerType = $this->loggerType->whereId($id)->first();

        if (! $loggerType->fill(Input::all())->isValid())
        {
            return Redirect::back()->withInput()->withErrors($loggerType->errors);
        }

        $loggerType->save();

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
        $loggerType = LoggerType::find($id);
        $loggerType->delete();
	}


}
