<style>
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
</style>


<header>
    <nav>
        <a href="#" class="logo">Quizify</a>
        <ul>
            <li><a href="{{ route('dashboard') }}">Home</a></li>
            @if (Auth::id() == 1)
                <li><a href="../index-quiz">Quizzes</a></li>
                <li><a href="../create-quiz">Create Quiz</a></li>
                <li><a href="../leaderboard">Leaderboard</a></li>

            @else
                <li><a href="userIndex-quiz">Quizzes</a></li>
                <li><a href="index-score">Leaderboard</a></li>
            @endif
            
        </ul>
    </nav>
</header>
