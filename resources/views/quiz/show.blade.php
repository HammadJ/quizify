@extends('layouts/master')
<title>Quiz Name</title>

@section('contents')
    <style>
        .quiz-container {
            max-width: 800px;
            text-align: center;
            padding: 50px;
            margin: 50px auto;
            border-radius: 20px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 0px 30px 0px #180a3e3a;
        }

        h1 {
            margin-bottom: 50px;
        }

        .question {
            margin-top: 50px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-size: 18px;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        #submit {
            border-radius: 7px;
            background-color: #9149fe;
            color: white;
            font-family: 'Varela Round', sans-serif;
            padding: 12px 20px;
            font-size: 15px;
            border: none;
            cursor: pointer;
            margin-top: 30px;
        }

        #submit:hover {
            background-color: #781eff;
        }
    </style>

    <p hidden>{{ $i = 1 }}</p>
    <div class="quiz-container">
        <h1>{{ $quiz->title }}</h1>
        @forelse ($question as $q)
            <div class="question">
                <h2>Question {{ $i++ }}</h2>
                <h2>{{ $q->question }}</h2>
                Option 1: {{ $q->option1 }} </br>
                Option 2: {{ $q->option2 }} </br>
                Option 3: {{ $q->option3 }} </br>
                Option 4: {{ $q->option4 }} </br>
                Correct Option: {{ $q->correctAnswer }}
            </div>
        @empty
            No Question Avaliable
        @endforelse

    </div>
@endsection
