@extends('layouts/collectData')
@section('amps')
    <h4>
        <div class="container-fluid">
            <div class="row col-md-12">
                <div class="col-md-1">
                    <span class="glyphicon glyphicon-th-list"></span>
                    {{Form::label('Amps')}}
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
                    <th>Amps</th>
                    <th>Amp Minutes</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
                @foreach ($amps as $amp)
                    <tr>
                        <td>
                            {{link_to("/amps/$amp->id/edit",$amp->id)}}
                        </td>
                        <td>
                            {{$amp->record->name}}
                        </td>
                        <td>
                            {{$amp->amp}}
                        </td>
                        <td>
                            {{$amp->amp_minute}}
                        </td>
                        <td>
                            {{$amp->created_at}}
                        </td>
                        <td>
                            {{$amp->updated_at}}
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
                    "{{route('amps.index')}}",
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
                "{{route('amps.index')}}",
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
