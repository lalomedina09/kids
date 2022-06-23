<div class="row mb-5">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-8 col-12">
        <h3>{{ $subtitle ?? '' }}</h3>
    </div>

    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-4 col-12">
        <div class="btn-group float-right">
            <a href="{{ route('dashboard.speakers.create') }}" class="btn btn-outline-primary">
                <span class="fa fa-plus"></span> Nuevo
            </a>
             <a href="{{ route('dashboard.speakers.trashed') }}" class="btn btn-outline-primary">
                <span class="fa fa-trash"></span> Papelera
            </a>
        </div>
    </div>
</div>
