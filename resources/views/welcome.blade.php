<head>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <title>Quizify</title>

</head>

<style>
    body {
        font-family: 'Varela Round', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #c1c0f7;
    }

    header {
        border-radius: 10px;
        background-color: #ddddff;
        color: #6245a0;
        padding: 20px;
    }

    nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        text-decoration: none;
    }

    nav a {
        font-weight: bold;
        color: #6245a0;
        text-decoration: none;
    }

    nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
    }

    nav ul li {
        margin-right: 70px;
    }

    nav ul li a {
        text-decoration: none;
        color: #463bad;
    }

    .hero-section {
        background: url(hero.jpg) 0 0 no-repeat fixed;
        position: relative;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: 30px;
        width: 95%;
        height: 100%;
        object-fit: cover;
        height: 700px;
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

    nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        text-decoration: none;
    }
</style>
<header>

    <nav>
        <a href="#" class="logo">Quizify</a>
    </nav>
</header>
<div class="hero-section" >
    <div class="hero-overlay">
        <div class="hero-text">
            <h1>Welcome to Our Quiz Website</h1>
            <p>Test your knowledge and challenge your friends</p>
            @auth
                <a href="{{ url('/dashboard') }}" class="hero-btn">Go To Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="hero-btn">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="hero-btn">Register</a>
                @endif
            @endauth
        </div>
    </div>
</div>
