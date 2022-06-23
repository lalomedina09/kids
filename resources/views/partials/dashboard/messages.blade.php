@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
        <button class="close" data-dismiss="alert"><span class="fa fa-times"></span></button>
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div>
@endif

@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <button class="close" data-dismiss="alert"><span class="fa fa-times"></span></button>
        {{ session('success') }}
    </div>
@endif

@if(session()->has('warning'))
    <div class="alert alert-warning alert-dismissible fade show">
        <button class="close" data-dismiss="alert"><span class="fa fa-times"></span></button>
        {{ session('warning') }}
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        <button class="close" data-dismiss="alert"><span class="fa fa-times"></span></button>
        {{ session('error') }}
    </div>
@endif

@if(session()->has('deleted'))
    <div class="alert alert-warning alert-dismissible fade show">
        <button class="close" data-dismiss="alert"><span class="fa fa-times"></span></button>
        {{ session('deleted.message') }}
        @if (session()->has('deleted.undo'))
            <a href="{{ session('deleted.undo') }}"
                class="btn btn-sm btn-outline-secondary"
                data-method="post"
                data-token="{{ csrf_token() }} "
                data-confirm="@lang('Are you sure?')">
                @lang('Restore')
            </a>
        @endif
    </div>
@endif
