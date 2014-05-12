<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Surface Finish Tech</title>

    {{HTML::style('components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css')}}
    {{HTML::style('components/bootstrap/dist/css/bootstrap.css')}}
    {{HTML::style('components/bootstrap/dist/css/bootstrap-theme.css')}}

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {{HTML::script('components/jquery/dist/jquery.js',array('type'=>'text/javascript'))}}
    {{HTML::script('components/jquery-cookie/jquery.cookie.js',array('type'=>'text/javascript'))}}
    {{HTML::script('components/bootstrap/dist/js/bootstrap.js',array('type'=>'text/javascript'))}}
    {{HTML::script('components/moment/moment.js',array('type'=>'text/javascript'))}}
    {{HTML::script('components/eonasdan-bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js',array('type'=>'text/javascript'))}}
    {{HTML::script('components/eonasdan-bootstrap-datetimepicker/src/js/locales/bootstrap-datetimepicker.en-gb.js',array('type'=>'text/javascript'))}}

</head>
<body>
    <h2>SFT - Data Collection</h2>
    <ul class="nav nav-tabs">
        <li class="{{Form::activeNavTab('home')}}"><a href="{{action('HomeController@showWelcome')}}#home" data-toggle="tab">Home</a></li>
        <li class="{{Form::activeNavTab('amps')}}"><a href="{{route('amps.index')}}#amps" data-toggle="tab">Amps</a></li>
        <li class="{{Form::activeNavTab('volts')}}"><a href="{{route('volts.index')}}#volts" data-toggle="tab">Volts</a></li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Setup<span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
            </ul>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane {{ Form::activeNavTab('home') }}"" id="home">
            @yield('home')
        </div>
        <div class="tab-pane {{ Form::activeNavTab('amps') }}" id="amps">
            @yield('amps')
        </div>
        <div class="tab-pane {{ Form::activeNavTab('volts') }}" id="volts">
            @yield('volts')
        </div>
        <div class="tab-pane" id="setup">
            @yield('setup')
        </div>
    </div>

    <script>
        $(document).on('click.bs.tab.data-api', '[data-toggle="tab"], [data-toggle="pill"]', function (e) {
            e.preventDefault()
            orgHash = "{{Form::orgActiveNavTab()}}"
            if (orgHash != e.currentTarget.hash) {
                window.location = e.currentTarget.href.replace(/#.*/,'');
            }
        })
    </script>

</body>
</html>