@extends('layouts/master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<title>Create Quiz</title>

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

        h1 {
            text-align: center;
            margin-bottom: 30px;
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

        .add-question-btn {
            background-color: #e3e6ff;
            color: #9149fe;
            font-size: 14px;

            margin-top: 20px;
            padding: 12px 20px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }

        .add-question-btn:hover {
            background-color: rgb(90, 90, 252);
            color: #e3e6ff;
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
        <h1>Create a Quiz</h1>
        <form action="../store-question" method="POST">
            @csrf
            <div id="dynamicAddRemove">
                <div>
                    <input type="text" hidden name="field[0][quiz_id]" value="{{ $id }}" />
                    <label for="question1">Question 1</label>
                    <input type="text" id="question1" placeholder="Enter question" name="field[0][question]" />
                    <label for="answer">Answer</label>
                    <input type="text" placeholder="Enter answer 1" name="field[0][option1]" />
                    <input type="text" placeholder="Enter answer 2" name="field[0][option2]" />
                    <input type="text" placeholder="Enter answer 3" name="field[0][option3]">
                    <input type="text" placeholder="Enter answer 4" name="field[0][option4]">
                    <label for="correct-answer">Correct Answer</label>
                    <input type="text" placeholder="Enter correct answer" name="field[0][correctAnswer]" />
                </div>
            </div>
            <button class="add-question-btn" id="add-btn">Add New Question</button>

            <script type="text/javascript">
                var i = 0;
                var j = 1;
                $("#add-btn").click(function(e) {
                    ++i;
                    ++j;
                    $("#dynamicAddRemove").append('<div><input type="text" name="field[' + i +
                        '][quiz_id]" hidden value={{ $id }} /><label for="question' + j + '">Question ' + j +
                        '</label><input  type="text" id="question' + j + '" name="field[' + i +
                        '][question]" placeholder="Question" /><label for="answer">Answer</label><input type="text" name="field[' +
                        i + '][option1]" placeholder="Option1" /><input type="text" name="field[' + i +
                        '][option2]" placeholder="Option2" /><input type="text" name="field[' + i +
                        '][option3]" placeholder="Option3" /><input type="text" name="field[' + i +
                        '][option4]" placeholder="Option4" /><input type="text" name="field[' + i +
                        '][correctAnswer]" placeholder="Correct Option" /><button type="button" class="add-question-btn remove-div">Remove</button></div>'
                    );
                    e.preventDefault();
                });
                $(document).on('click', '.remove-div', function() {
                    $(this).parent('div').remove();
                });
            </script>


            <button type="submit">Create Quiz</button>
        </form>
    </div>
@endsection
