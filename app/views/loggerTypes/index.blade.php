@extends('layouts/collectData')
@section('loggerTypes')
<h4>
    <div class="container-fluid">
        <div class="row col-md-12">
            <div class="col-md-2">
                <span class="glyphicon glyphicon-th-list"></span>
                {{Form::label('LoggerTypes')}}
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
            @foreach ($loggerTypes as $loggerType)
                <tr>
                    <td>
                        {{link_to("/loggerTypes/$loggerType->id/edit",$loggerType->id)}}
                    </td>
                    <td>
                        {{$loggerType->name}}
                    </td>
                    <td>
                        {{$loggerType->description}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop
