<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                <div>
                    <form action="{{ url('search') }}" method="post" accept-charset="utf-8">
                        @csrf
                        <div class="contact-form">
                            <div class="form-group">
                                <div class="col-sm-10">          
                                    <input type="text" class="form-control" id="name" placeholder="Goalgetter Name" name="name" >
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
  
                    @if (session('goals'))
                    <div class="alert alert-success">
                    {{session('goalgetter')}} scored {{ session('goals') }} goals this season.
                    </div>
                    @endif
                    
                    @if (session('noGoals'))
                    <div class="alert alert-danger">
                    {{session('goalgetter')}} has not scored this season.
                    </div>
                    @endif
                </div>
                <div>
                    <table>
                    <tbody>
                    <tr>
                    <td>Team 1</td>
                    <td></td>
                    <td>Team 2</td>
                    <td>Date</td>
                    </tr>
                        @foreach ($transformed as $match)
                        <tr>
                        <td>{{$match['team1']}}</td>
                        <td>vs</td>
                        <td>{{$match['team2']}}</td>
                        <td>{{$match['date']}}</td>
                        </tr> 
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
