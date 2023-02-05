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
            margin-bottom: 30px;
        }

        .question {
            background-color: #9149fe1e;
            padding: 20px 20px;
            margin-top: 30px;
            border-radius: 20px;
        }

        .option {
            font-size: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-size: 18px;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        h5 {
            font-weight: lighter;
            font-size: 12px;
            margin-bottom: 8px;
        }

        h2 {
            margin-top: 1px;
        }

        .correctOption {
            font-size: 20px;
            background-color: #9149fe;
            border-radius: 10px;
            width: 40%;
            color: white;
            text-align: center;

            margin: auto;
            padding: 10px 10px;
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

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <p hidden>{{ $i = 1 }}</p>
    <div class="quiz-container">
        <h1>{{ $quiz->title }}</h1>
        @forelse ($question as $q)
            <div class="question">
                <h5>QUESTION {{ $i++ }}</h5>
                <h2>{{ $q->question }}</h2>
                <div class="option"> Option 1: {{ $q->option1 }} </div></br>
                <div class="option"> Option 2: {{ $q->option2 }} </div></br>
                <div class="option"> Option 3: {{ $q->option3 }} </div></br>
                <div class="option"> Option 4: {{ $q->option4 }} </div></br>
                <div class="correctOption"> Correct Option: {{ $q->correctAnswer }} </div>
            </div>
        @empty
            No Question Avaliable
        @endforelse

    </div>
@endsection
