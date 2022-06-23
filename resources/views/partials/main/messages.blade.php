{{-- success --}}
@if(session('success'))
    <script>
        sweetAlert({
            title: "Éxito",
            text: "{!! session('success') !!}",
            timer: 4000,
            type: "success",
            showConfirmButton: false
        });
    </script>
@endif

{{-- error --}}
@if(session('error'))
    <script>
        sweetAlert({
            title: "Error",
            text: "{!! session('error') !!}",
            timer: 4500,
            type: "error",
            showConfirmButton: false
        });
    </script>
@endif

{{-- status --}}
@if(session('status'))
    <script>
        sweetAlert({
            title: "",
            text: "{!! session('status') !!}",
            timer: 4500,
            type: "info",
            showConfirmButton: false
        });
    </script>
@endif

{{-- validation --}}
@if(isset($errors) and $errors->count())
    <script>
        sweetAlert({
            title: "Error",
            text: "{!! $errors->first() !!}",
            timer: 4500,
            type: "error",
            showConfirmButton: false
        });
    </script>
@endif
