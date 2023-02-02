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

    .mydropdown {
        color: #463bad;
        font-weight: bold;


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
            <li class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown>
                    <x-slot name="trigger">
                        <button
                            class="mydropdown inline-flex items-center border border-transparent transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </li>

        </ul>

    </nav>
</header>
