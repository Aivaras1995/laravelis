@auth
    <ul class="hidden w-8/12 md:flex items-center justify-center space-x-8">
        <li>
            <span>{{auth()?->user()?->email}}</span>
        </li>
        @if (auth()?->user()?->isPersonnel())
            <li>
                <a href="{{route('dashboard')}}">
                    {{ __('Dashboard') }}
                </a>
            </li>
        @endauth
        <li>
            <a class="justify-between" href="{{route('profile.edit')}}">
                {{ __('Edit profile') }}
            </a>
        </li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{route('logout')}}"
                   onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Log Out') }}
                </a>
            </form>
        </li>
    </ul>
@endauth
