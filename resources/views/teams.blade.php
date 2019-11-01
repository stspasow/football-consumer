<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }
            .links {
                padding-bottom: 65px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref">
            <div class="content">
                <div class="links">
                    <a href="{{ url('/home') }}">Next gameday</a>
                    <a href="{{ url('/all') }}">All matches this season</a>
                    <a href="{{ url('/teams') }}">Teams</a>
                </div>
            <table>
            <tbody>
            <tr>
            <td>Team Name</td>
            <td>Wins #</td>
            <td>Losses #</td>
            </tr>
                @foreach ($teams as $team)
                <tr>
                <td>{{$team['name']}}</td>
                <td>{{$team['wins']}}</td>
                <td>{{$team['losses']}}</td>
                </tr> 
                @endforeach
            </table>
            </div>
        </div>
    </body>
</html>
