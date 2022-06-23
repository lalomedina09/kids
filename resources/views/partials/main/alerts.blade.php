{{-- Bootstrap Alerts --}}
@if (Session::has('info_notice'))
    <div class="alert alert-info auto text-center">
        {{ Session::get('info_notice') }}
    </div>
@endif
@if (Session::has('success_notice'))
    <div class="alert alert-success auto text-center">
        {{ Session::get('success_notice') }}
    </div>
@endif
@if (Session::has('error_notice'))
    <div class="alert alert-danger auto text-center">
        {{ Session::get('error_notice') }}
    </div>
@endif
@if (Session::has('warning_notice'))
    <div class="alert alert-warning auto text-center">
        {{ Session::get('warning_notice') }}
    </div>
@endif
{{-- Toasts --}}
@if (Session::has('info_toast'))
    @push('scripts-inline')
        <script type="text/javascript" id="fed-script-toast">
            toastr['info']("{{ Session::get('info_toast') }}");
            document.getElementById('fed-script-toast').remove();
        </script>
    @endpush
@endif
@if (Session::has('success_toast'))
    @push('scripts-inline')
        <script type="text/javascript" id="fed-script-toast">
            toastr['success']("{{ Session::get('success_toast') }}");
            document.getElementById('fed-script-toast').remove();
        </script>
    @endpush
@endif
@if (Session::has('error_toast'))
    @push('scripts-inline')
        <script type="text/javascript" id="fed-script-toast">
            toastr['error']("{{ Session::get('error_toast') }}");
            document.getElementById('fed-script-toast').remove();
        </script>
    @endpush
@endif
@if (Session::has('warning_toast'))
    @push('scripts-inline')
        <script type="text/javascript" id="fed-script-toast">
            toastr['warning']("{{ Session::get('warning_toast') }}");
            document.getElementById('fed-script-toast').remove();
        </script>
    @endpush
@endif
