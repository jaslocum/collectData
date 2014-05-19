@extends('layouts/collectData')
@section('records')
<h4>
    <div class="container-fluid">
        <div class="row col-md-12">
            <div class="row col-md-2">
                <span class="glyphicon glyphicon-th-list"></span>
                {{Form::label('Records')}}
            </div>
            <div class="col-md-1">
                <button type="button"
                        onclick="{{$createRoute}}"
                        class="btn btn-success"
                >
                    <span class="glyphicon glyphicon-plus-sign"></span> Add
                </button>
            </div>
        </div>
    </div>
</h4>
{{Form::open()}}
<div id="t1div" class="col-md-12">
    <span class="col-md-1"></span>
    <table id="t1" class="col-md-10 table table-striped" style="border-width: 1px">
        <tbody>
            <tr>
                <th>Id</th>
                <th>Active</th>
                <th>Name</th>
                <th>Description</th>
                <th>Command</th>
                <th>Multiplier</th>
                <th>Logger</th>
                <th>Record Type</th>
                <th>Unit</th>
                <th>Graph Low</th>
                <th>Graph High</th>
            </tr>
            @foreach ($records as $record)
                <tr>
                    <td>
                        <button type="button"
                            onclick="{{$record->editRoutes}}"
                            class="btn btn-primary"
                        >
                            <span class="glyphicon glyphicon-edit"></span> {{$record->id}}
                        </button>
                    </td>
                    <td>
                        {{Form::checkbox('active',$record->active,$record->active,array('readonly'=>'readonly', 'disabled'=>'disabled'))}}
                    </td>
                    <td>
                        {{$record->name}}
                    </td>
                    <td>
                        {{$record->description}}
                    </td>
                    <td>
                        {{$record->command}}
                    </td>
                    <td>
                        {{$record->multiplier}}
                    </td>
                    <td>
                        {{$record->logger->name}}
                    </td>
                    <td>
                        {{$record->recordType->name}}
                    </td>
                    <td>
                        {{$record->unit->name}}
                    </td>
                    <td>
                        {{$record->graph_y_lower}}
                    </td>
                    <td>
                        {{$record->graph_y_upper}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{Form::close()}}
@stop
