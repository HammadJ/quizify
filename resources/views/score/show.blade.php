@extends('layouts/master')
<title>{{$quiz_name}} - {{$score}}</title>

@section('contents')
    </head>
    <style>
        .result-container {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
            padding: 50px;
        }

        h1 {
            margin-bottom: 50px;
        }

        .result-card {
            background-color: #f2f2f2;
            padding: 50px;
            border-radius: 10px;
            margin-top: 50px;
            box-shadow: 0px 0px 30px 0px #18016b3a;

        }

        h2 {
            margin-bottom: 20px;
        }

        h3 {
            margin-bottom: 20px;
            font-size: 32px;
        }

        p {
            margin-bottom: 20px;
        }

        #try-again {
            background-color: rgb(90, 90, 252);
            color: #e3e6ff;
            padding: 12px 20px;
            border: none;
            cursor: pointer;
            margin-top: 20px;

            width: 100%;
            height: 50px;
            font-size: medium;
            border-radius: 7px;
            cursor: pointer;
        }

        #try-again:hover {
            background-color: #0616a6;
            color: #f0e9fc;
        }
    </style>

    <div class="result-container">


        <h1>{{ $quiz_name }}</h1>
        <div class="result-card">
            <h2>You scored:</h2>
            <h3 id="score">{{ $score }}/{{ $totalScore }}</h3>
            <p id="comment">You did okay. Try again and see if you can improve your score.</p>
            <button id="try-again" type="button" onclick="location.href='userShow-quiz/{{ $quiz_id }}' ">Try
                Again</button>
        </div>
    </div>


@endsection
