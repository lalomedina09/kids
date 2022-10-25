@php
    $searching = (isset($search) && is_array($search));
    $search_query = ($searching && array_has($search, 'q')) ? $search['q'] : null;
    $search_category = ($searching && array_has($search, 'category')) ? $search['category'] : null;
@endphp

@push('styles')
    <link href="{{ mix('css/vendor/select.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/vendor/select.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/search/bar.js') }}"></script>
@endpush

<div id="searchbar">
    <form role="search" class="form-search" action="{{ route('search') }}">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend qd-select">
                    <select name="category" class="select2">
                        <option value="">@lang('All categories')</a>
                        @php
                            $categories = App\Models\Category::whereIn('id', ['4', '5', '6', '7', '8', '9'])->get();
                        @endphp

                        @foreach($categories as $category)
                            <option value="{{ $category->slug }}" {{ ($search_category === $category->slug) ? 'selected="selected"' : '' }}>{{ $category->present()->name }}</a>
                        @endforeach
                    </select>
                </div>
                <input type="search" name="q" aria-label="Buscar" class="form-control" placeholder="@lang('What are you searching for?')" value="{{ $search_query }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">
                        <img src="{{ asset('images/search.png') }}" alt="Buscar">
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
