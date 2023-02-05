@extends('layouts/master')
<title>All Quizzes</title>

@section('contents')
    <style>
        .quiz-container {
            display: grid;
            gap: 50px;
            grid-template-columns: auto auto auto;
            padding: 10px;
        }

        .quiz-card img {
            border-radius: 20px;
            position: relative;
            width: 340px;
            height: 220px;
        }

        .quiz-card {
            padding: 20px;
            font-size: 30px;
            text-align: center;
            color: white;
            padding: 20px;
            text-align: center;
        }

        h4 {
            color: #23085a;
            margin-bottom: 5px;
            margin-top: 8px;
        }


        .start-quiz-btn {
            border-radius: 7px;
            background-color: #9149fe;
            color: white;
            padding: 12px 20px;
            border: none;
            cursor: pointer;
            margin-top: 5px;
        }

        .start-quiz-btn:hover {
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


    <h1>All Quizzes</h1>
    <div class="quiz-container">

        @foreach ($quiz as $q)
            <div class="quiz-card">
                <img src="uploads/{{ $q->image }}" alt="Quiz Image">
                <h4>{{ $q->title }}</h4>
                <button onclick="location.href='userShow-quiz/{{ $q->id }}';" class="start-quiz-btn">Start Quiz</button>
                <button onclick="location.href='showHistory/{{ $q->id }}';" class="start-quiz-btn">View History</button>
            </div>
        @endforeach

    </div>
@endsection
