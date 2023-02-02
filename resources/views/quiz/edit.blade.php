@extends('layouts/master')
<title>Edit Quiz</title>

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

        button {
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

    <div class="container">
        <div hidden> {{$i=1}} </div>
        @forelse ($question as $q)
            <h2>Question {{$i++}} </h2>
            <h2>{{ $q->question }}</h2>
            <button onclick="location.href='../edit-question/{{ $q->id }}';">Edit Question</button>
            <button onclick="location.href='../delete-question/{{ $q->id }}';">Delete Question</button>
        @empty
            No Question Available
            @endforelse
            
            <button onclick=" location.href='../create-question/{{$quiz->id}}' ">Add Question</button>



    </div>
@endsection
