@push('scripts')
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js"></script>
@endpush

@guest
    @if(!request()->is('registro'))
        <div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <img src="/images/close.svg" alt="Close modal">
                        </button>

                        @include('partials.auth.register_form')
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(!request()->is('iniciar-sesion'))
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <img src="/images/close.svg" alt="Close modal">
                        </button>

                        @include('partials.auth.login_form')
                    </div>
                </div>
            </div>
        </div>
    @endif
@endguest

<div id="modal-search" class="modal-fullscreen">
    <button type="button" class="close">
        <span class="fa fa-close"></span>
    </button>

    <div class="container">
        <div class="align-items-center align-vertical">
            <form action="{{ route('search') }}">
                <input type="text" name="q" placeholder="Buscar">
            </form>
            <p class="mt-3 text-muted">Presiona enter para buscar o ESC para salir</p>
        </div>
    </div>
</div>

<div class="modal fade" id="newsletter-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="/images/close.svg" alt="Close modal">
                </button>

                @include('partials.auth.newsletter_form')
            </div>
        </div>
    </div>
</div>
