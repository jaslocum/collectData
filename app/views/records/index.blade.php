@extends('layouts/collectData')
@section('records')
<h4>
    <div class="container-fluid">
        <div class="row col-md-12">
            <div class="col-md-2">
                <span class="glyphicon glyphicon-th-list"></span>
                {{Form::label('Records')}}
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
                        {{link_to("/records/$record->id/edit",$record->id)}}
                    </td>
                    <td>
                        {{$record->active}}
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
                        {{$record->record_type->name}}
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
@stop