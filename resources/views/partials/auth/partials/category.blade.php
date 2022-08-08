@php $category = $categories->where('code', $code)->first() @endphp
    @if ($category)
    <div class="form-group">
        <label for="registerTopicsSaving" class="text-uppercase text-danger text-underline mb-2">{{ $name }}</label>
        @foreach($category->children as $category)
            <div class="custom-control custom-checkbox mt-1">
                <label class="text-uppercase">
                    <input type="checkbox" name="interests[]" value="{{ $category->id }}"> {{ $category->name }}
                    <span class="custom-control-indicator"></span>
                </label>
            </div>
        @endforeach
    </div>
@endif
