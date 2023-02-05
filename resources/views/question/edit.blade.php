@extends('layouts/master')
<title>Document</title>

@section('contents')
    <style>
        .container {
            max-width: 600px;
            margin: 50px auto;
            border-radius: 20px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 0px 30px 0px #180a3e3a;
        }

        form {
            display: flex;
            flex-wrap: wrap;
        }

        label {
            width: 100%;
            margin-bottom: 10px;
            margin-top: 25px;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px 20px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
        }

        button[type="submit"] {
            width: 100%;
            height: 50px;
            padding: 12px 20px;
            background-color: #9149fe;
            color: #fff;
            border: none;
            font-size: medium;
            border-radius: 7px;
            cursor: pointer;
            margin-top: 30px;
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


    <div class="container">

        <form action="../update-question/{{ $question->id }}">

            <label for="question">Question</label>
            <input type="text" id="question" placeholder="Enter question" name="question"
                value="{{ $question->question }}" />
            <label for="answer">Answer</label>
            <input type="text" placeholder="Enter answer 1" name="option1" value="{{ $question->option1 }}" />
            <input type="text" placeholder="Enter answer 2" name="option2" value="{{ $question->option2 }}" />
            <input type="text" placeholder="Enter answer 3" name="option3" value="{{ $question->option3 }}" />
            <input type="text" placeholder="Enter answer 4" name="option4" value="{{ $question->option4 }}" />
            <label for="correct-answer">Correct Answer</label>
            <input type="text" placeholder="Enter correct answer" name="correctAnswer"
                value="{{ $question->correctAnswer }}" />

            <button type="submit">Update Question</button>
        </form>
    </div>
@endsection
