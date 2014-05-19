@extends('layouts/collectData')
@section('recordTypes')
<h4>
    <div class="container-fluid">
        <div class="row col-md-12">
            <div class="col-md-2">
                <span class="glyphicon glyphicon-th-list"></span>
                {{Form::label('Record Types')}}
            </div>
        </div>
    </div>
</h4>
<div id="t1div" class="col-md-12">
    <span class="col-md-1"></span>
    <table id="t1" class="col-md-10 table table-striped" style="border-width: 1px">
        <tbody>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
            </tr>
            @foreach ($recordTypes as $recordType)
                <tr>
                    <td>
                        <button type="button"
                                onclick="{{$recordType->editRoutes}}"
                                class="btn btn-primary"
                            >
                            <span class="glyphicon glyphicon-edit"></span> {{$recordType->id}}
                        </button>
                    </td>
                    <td>
                        {{$recordType->name}}
                    </td>
                    <td>
                        {{$recordType->description}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop
