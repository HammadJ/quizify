@extends('layouts/master')
<title>Leaderboard</title>

@section('contents')

    <style>
        .leaderboard {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 40px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 30px 0px #3a18965f;

        }

        .header {
            font-size: 32px;
            font-weight: bold;
            color: #333333;
            margin: 30px 0px;
        }

        .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 80%;
            margin: 20px 0px;
            padding: 15px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 15px #6161614d;
        }

        .rank {
            font-size: 20px;
            font-weight: bold;
            color: #333333;
        }

        .name {
            font-size: 20px;
            color: #333333;
        }

        .score {
            font-size: 20px;
            font-weight: bold;
            color: #333333;
        }

        .highlight {
            background-color: #d9d5fe;
        }
    </style>

    <div class="leaderboard">
        <div class="header">Quiz Leaderboard</div>

        <p hidden>{{ $i = 1 }}</p>

        <div class="row highlight">
            <div class="rank">No.</div>
            <div class="score">Quiz Name</div>
            <div class="score">Total Score</div>
            <div class="score">Obtain Score</div>
        </div>

        @forelse ($score as $s)
            <div class="row highlight">
                <div class="rank">{{ $i++ }}</div>
                <div class="name">{{ $s->quiz_id }}</div>
                <div class="name">{{ $s->totalScore }}</div>
                <div class="score">{{ $s->score }}</div>
            </div>
        @empty
            No Record Avalible
        @endforelse


    </div>
@endsection