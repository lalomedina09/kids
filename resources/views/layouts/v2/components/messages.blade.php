{{-- success --}}
@if(session('success'))
    <script>
        iziToast.success({
            title: 'OK',
            message: "{!! session('success') !!}",
        });
    </script>
@endif

{{-- error --}}
@if(session('error'))
    <script>
        iziToast.error({
            title: 'Error',
            message: "{!! session('error') !!}",
        });
    </script>
@endif

{{-- warning --}}
@if(session('warning'))
    <script>
        iziToast.warning({
            title: 'Caution',
            message: "{!! session('warning') !!}",
        });
    </script>
@endif

{{-- status --}}
@if(session('status'))
    <script>
        iziToast.info({
            title: 'Info',
            message: "{!! session('status') !!}",
        });
    </script>
@endif

{{-- validation --}}
@if(isset($errors) and $errors->count())
    <script>
        iziToast.error({
                title: 'Error',
                message: "{!! $errors->first() !!}",
            });
    </script>
@endif
