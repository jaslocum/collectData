@extends('layouts/collectData')
@section('volts')
    <h4>
        <div class="container-fluid">
            <div class="row col-md-12">
                <div class="col-md-1">
                    <span class="glyphicon glyphicon-th-list"></span>
                    {{Form::label('Volts')}}
                </div>
                <div class="col-md-3 form-group" id="d1div">
                    {{Form::label('edate','On or Before',array('class' => 'control-label'))}}
                    <div class="input-group date col-md-12" id="d1">
                        {{Form::text('edate',$d1,array('class' => 'form-control', 'id'=>'d1val'))}}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div>
                <div class="col-md-2" id="r1div">
                    <div class="form-group" id="r1s">
                        {{Form::label('record_id', 'Record') }}
                        {{Form::select(
                            'r1',
                            $records,
                            $r1,
                            array(
                                'id'=>'r1',
                                'class'=>'form-control',
                                'onchange'=>'r1Change()'
                            )
                        )}}
                    </div>
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
                    <th>Record</th>
                    <th>Volts</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
                @foreach ($volts as $volt)
                    <tr>
                        <td>
                            <button type="button"
                                    onclick="{{$volt->editRoutes}}"
                                    class="btn btn-primary"
                            >
                                <span class="glyphicon glyphicon-edit"></span> {{$volt->id}}
                            </button>
                        </td>
                        <td>
                            {{$volt->record->name}}
                        </td>
                        <td>
                            {{$volt->volt}}
                        </td>
                        <td>
                            {{$volt->created_at}}
                        </td>
                        <td>
                            {{$volt->updated_at}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        $('#d1').datetimepicker()
            .on('dp.change', function(e){
                // `e` here contains the extra attributes
                $.get(
                    "{{route('volts.index')}}",
                    {
                        d1 : $("#d1val").val(),
                        r1 : $('#r1').val()
                    },
                    function(data, status, xhr){
                        $('#t1div').html($(data).find('#t1'));
                        history.replaceState(data,'',this.url);
                    }
                );
            });
        function r1Change(){
            $.get(
                "{{route('volts.index')}}",
                {
                    d1 : $("#d1val").val(),
                    r1 : $('#r1').val()
                },
                function(data){
                    $('#t1div').html($(data).find('#t1'));
                    $('#r1div').html($(data).find('#r1s'));
                    history.replaceState(data,'',this.url);
                }
            );
        }
    </script>
@stop
