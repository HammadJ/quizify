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

        .submit {
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

        b{
            text-align: center;
            
        }

        div.topright {
            position: fixed;
            text-align: center;
            background-color: #781eff;
            border-radius: 50%;
            padding: 25px 25px;
            width: 50px;
            height: 50px;
            margin-left: 175vh;
        }
    </style>

    <p hidden>{{ $i = -1 }}</p>


    <div class="topright">
        <b id="timer">{{ count($question) * 60 }} </b>
        <b>seconds</b>
    </div>
    <div class="quiz-container">

        <span>Form will automatically submit in <b>{{ count($question) * 60 }}</b>
            <b>seconds</b>.
        </span>

        <h1>Quiz Name</h1>
        <form id="quiz-form" action="../cal-score" name="quiz_form">
            <input type="text" hidden value="{{ $quiz->id }}" name="quiz_id">
            @forelse ($question as $q)
                <div class="question">
                    <h2>Question {{ ++$i + 1 }}</h2>
                    <input type="text" hidden value="{{ $q->id }}" name="field[{{ $i }}][question_id]">
                    <h2>{{ $q->question }}</h2>
                    <label>
                        <input type="radio" name="field[{{ $i }}][answer]"
                            value="{{ $q->option1 }}">{{ $q->option1 }}
                    </label>
                    <label>
                        <input type="radio" name="field[{{ $i }}][answer]"
                            value="{{ $q->option2 }}">{{ $q->option2 }}
                    </label>
                    <label>
                        <input type="radio" name="field[{{ $i }}][answer]"
                            value="{{ $q->option3 }}">{{ $q->option3 }}
                    </label>
                    <label>
                        <input type="radio" name="field[{{ $i }}][answer]"
                            value="{{ $q->option4 }}">{{ $q->option4 }}
                    </label>
                </div>

            @empty
                No Question Avaliable
            @endforelse

            <button class="submit">Submit Quiz</button>
        </form>



        <script>
            window.onload = function() {
                // Onload event of Javascript
                // Initializing timer variable
                var i = {{ $i + 1 }};
                var x = 60 * i;
                var y = document.getElementById("timer");
                // Display count down for 20s
                setInterval(function() {
                    if (x <= (x + 1) && x >= 1) {
                        x--;
                        y.innerHTML = '' + x + '';
                        if (x == 1) {
                            x = x + 1;
                        }
                    }
                }, 1000);
                // Form Submitting after 20s
                var auto_refresh = setInterval(function() {
                    submitform();
                }, 20000 * i);
                // Form submit function
                function submitform() {
                    document.getElementById("quiz-form").submit();
                }

            };
        </script>


    </div>
@endsection
