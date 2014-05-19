@extends('layouts/collectData')
@section('loggers')
<h4>
    <div class="container-fluid">
        <div class="row col-md-2">
             <span class="glyphicon glyphicon-th-list"></span>
            {{Form::label('Loggers')}}
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
</h4>
<div id="t1div" class="col-md-12">
    <span class="col-md-1"></span>
    <table id="t1" class="col-md-10 table table-striped" style="border-width: 1px">
        <tbody>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Logger Type</th>
                <th>IP Address</th>
                <th>Port</th>
            </tr>
            @foreach ($loggers as $logger)
                <tr>
                    <td>
                        <button type="button"
                                onclick="{{$logger->editRoutes}}"
                                class="btn btn-primary"
                            >
                            <span class="glyphicon glyphicon-edit"></span> {{$logger->id}}
                        </button>
                    </td>
                    <td>
                        {{$logger->name}}
                    </td>
                    <td>
                        {{$logger->description}}
                    </td>
                    <td>
                        {{$logger->loggerType->name}}
                    </td>
                    <td>
                        {{$logger->ip_address}}
                    </td>
                    <td>
                        {{$logger->port}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop
