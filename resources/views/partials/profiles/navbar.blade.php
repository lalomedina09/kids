<ul class="list-unstyled list-inline education--list text-center mb-4">
    @if (config()->has('money.modules.blog') && $user->hasRole('author'))
        <li class="list-inline-item {{ active_class('') }}">
            <a href="{{ route('authors.show', [$user->profile_key]) }}" class="text-uppercase">
                Artículos
            </a>
        </li>
    @endif

    @if (config()->has('money.modules.advice') && $user->hasRole('advisor'))
        <li class="list-inline-item {{ active_class('') }}">
            <a href="{{ route('qd.advice.advisors.show', [$user->profile_key]) }}" class="text-uppercase">
                Mentoría
            </a>
        </li>
    @endif
</ul>
