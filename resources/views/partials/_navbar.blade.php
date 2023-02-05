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



    .dropdown .dropbtn {
        border: none;
        outline: none;
        background-color: inherit;
        font-family: inherit;
        margin: 0;
        cursor: pointer;
        font-weight: bold;
        color: #6245a0;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        
        font-weight: bold;
        color: #6245a0;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        float: none;
        color: #6245a0;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
        display: block;
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
                <li><a href="../userIndex-quiz">Quizzes</a></li>
                <li><a href="../index-score">Leaderboard</a></li>
            @endif

            <li class="dropdown">
                <div class="dropbtn">{{ Auth::user()->name }}
                    <i class="fa fa-caret-down"></i>
                </div>
                <div class="dropdown-content">
                    <a href="{{route('profile.edit')}}">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </div>
            </li>

        </ul>
    </nav>
</header>
