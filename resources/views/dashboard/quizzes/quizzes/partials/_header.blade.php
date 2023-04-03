<div class="row mb-5">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-8 col-12">
        <h3>
            <a href="{{ route('dashboard.quizzes.index') }}">
                {{ $subtitle ?? '' }}
            </a>
        </h3>
    </div>

    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-4 col-12">
        <div class="btn-group float-right">
            <a href="{{ route('dashboard.quizzes.create') }}" class="btn btn-outline-primary">
                <i class="lni lni-plus"></i>
                Quiz
            </a>
            {{--@if ($categoryId != 0)
                <a href="{{ route('dashboard.quizzes.create', $categoryId) }}" class="btn btn-outline-primary">
                    <i class="lni lni-plus"></i>
                    Subcategoria
                </a>
            @endif--}}
            <a href="{{ route('dashboard.quizzes.trashed') }}" class="btn btn-outline-primary">
                <i class="lni lni-trash-can"></i>
                Papelera
            </a>
        </div>
    </div>
</div>
