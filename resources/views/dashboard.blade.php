@extends('layouts/master')
<title>Quiz Name</title>

@section('contents')
    <style>
        .hero-section {
            background: url(hero.jpg) 0 0 no-repeat fixed;
            position: absolute;
            top: 55%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 30px;
            width: 95%;
            height: 85%;
            object-fit: cover;
            background-size: cover;
            background-position: center;
        }

        .hero-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
        }

        .hero-overlay {
            background: rgba(122, 67, 223, 0.201);
            border-radius: 30px;

            overflow: hidden;
            height: 100%;
            z-index: 2;
        }

        .hero-text h1 {
            font-size: 42px;
            margin-bottom: 20px;
        }

        .hero-text p {
            font-size: 18px;
            margin-bottom: 40px;
        }

        .hero-btn {
            background-color: #463bad;
            color: white;
            font-size: 15px;
            padding: 12px 20px;
            border-radius: 8px;
            border: none;
            text-decoration: none;
            cursor: pointer;
        }

        .hero-btn:hover {
            background-color: #362aa8;
        }

        .features {
            display: flex;
            justify-content: space-between;
            padding: 100px;
        }

        .feature {
            flex: 1;
            text-align: center;
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


    <div class="hero-section">
        <div class="hero-overlay">
            <div class="hero-text">
                <h1>Welcome to Our Quiz Website</h1>
                <p>Test your knowledge and challenge your friends</p>
                @if (Auth::id() == 1)
                    <a href="create-quiz" class="hero-btn">Create Quiz</a>
                @else
                    <a href="userIndex-quiz" class="hero-btn">Start Quiz</a>
                @endif
            </div>
        </div>
    </div>
@endsection
