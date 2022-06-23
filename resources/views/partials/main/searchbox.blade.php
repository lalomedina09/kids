@php
    $id = (isset($id)) ? $id : 'searchbox';
    $resource = (isset($resource)) ? $resource : '';
    $limit = (isset($limit)) ? $limit : 1;
    $select_name = (isset($select_name)) ? $select_name : 'searchbox-select-name';
    $select_id = (isset($select_id)) ? $select_id : 'searchbox-select-id';
    $selected = (isset($selected)) ? $selected : collect([]);
@endphp

<div id="{{ $id }}" class="qd-searchbox" data-resource="{{ $resource }}" data-limit="{{ $limit }}">
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <label class="input-group-text searchbox-filter">@lang('Name')</label>
                <button class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split"
                    data-toggle="dropdown" data-reference="parent">
                </button>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item searchbox-filter-option"
                        data-filter="name">
                        @lang('Name')
                    </a>

                    <a href="#" class="dropdown-item searchbox-filter-option"
                        data-filter="email">
                        @lang('E-Mail')
                    </a>
                </div>
            </div>

            <input type="text" class="form-control searchbox-input" placeholder="@lang('Search')...">

            <div class="input-group-append">
                <button class="btn btn-outline-secondary searchbox-button">
                    <span class="fa fa-search"></span>
                    Buscar
                </button>
            </div>
        </div>
    </div>

    <div class="searchbox-selected"></div>

    <select name="{{ $select_name }}" class="searchbox-select" id="{{ $select_id }}" style="display:none;" multiple="multiple">
        @unless ($selected->isEmpty())
            @foreach ($selected as $option)
                <option value="{{ $option['value'] }}" selected="selected">{{ $option['label'] }}</option>
            @endforeach
        @endunless
    </select>
</div>
