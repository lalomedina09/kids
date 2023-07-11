<ul class="list-unstyled list-inline education--list text-center mb-4">
        <li class="list-inline-item {{ active_class('') }}">
            <a href="#profile-qdplay" class="text-uppercase">
                QD Play
            </a>
        </li>

    @if (config()->has('money.modules.blog') && $user->hasRole('author'))
        <li class="list-inline-item {{ active_class('') }}">
            <a href="#profile-articles" class="text-uppercase">
                Artículos
            </a>
        </li>
    @endif

    @if (config()->has('money.modules.advice') && $user->hasRole('advisor'))
        <li class="list-inline-item {{ active_class('') }}">
            <a href="{{ route('qd.advice.advisors.show', [$user->profile_key]) }}" class="text-uppercase">
                Asesoría
            </a>
        </li>
    @endif
</ul>
