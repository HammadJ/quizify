@extends('layouts/master')
<title>Create Quiz</title>

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

    input::file-selector-button {
        font-weight: bold;
        color: #9149fe;
        padding: 0.6em;
        font-family: 'Varela Round', sans-serif;
        border: 1px solid #9149fe;
        border-radius: 3px;
        background-color: white;
        margin-right: 10px;
    }

    input[type="file"] {
        font-family: 'Varela Round', sans-serif;
        
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

@section('contents')
    <div class="container">
        <h1>Create a Quiz</h1>
        <form action="store-quiz" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="quizTitle">Quiz Title</label>
            <input type="text" id="quizTitle" name="title" placeholder="Enter Quiz Title">

            <label for="quizImg">Quiz Image</label>
            <input type="file" id="quizImg" name="image">


            <button type="submit">Add Quiz</button>
        </form>
    </div>
@endsection
