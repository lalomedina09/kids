

{!! Form::hidden('id', old('id') ?? (isset($advertising) ? $advertising->id : null)) !!}
{!! Form::hidden('article_id', old('article_id') ?? (isset($article) ? $article->id : null)) !!}
{!! Form::hidden('updated_by', old('updated_by') ?? (isset($user) ? $user->id : null)) !!}


<div class="form-group">
    <label for="link" class="form-label">@lang('Destiny League'):</label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <span class="fa fa-link"></span>
            </span>
        </div>
        {!! Form::text('link', old('link') ?? (isset($advertising) ? $advertising->link : null),
        [
        'class' => 'form-control',
        'placeholder' => 'Destino',
        ]) !!}
    </div>
</div>

<div class="form-group">
    <label for="published_at" class="form-label">@lang('Publication Date'):</label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <span class="fa fa-calendar"></span>
            </span>
        </div>
        {!! Form::date('published_at', old('published_at') ?? (isset($advertising) ? $advertising->published_at : null),
        [
            'class' => 'form-control',
            'placeholder' => 'Fecha',
        ]) !!}
    </div>
</div>

<div class="form-group">
    <label for="published_at_expired" class="form-label">@lang('Publication Date Expiration'):</label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <span class="fa fa-calendar"></span>
            </span>
        </div>
        {{--{!! Form::date('published_at_expired', old('published_at_expired') ?? (isset($advertising) ? $advertising->published_at_expired : null),
        [
            'class' => 'form-control',
            'placeholder' => 'Fecha',
        ]) !!}--}}
         {!! Form::date('published_at_expired', old('published_at_expired') ?? (isset($advertising) ? \Carbon\Carbon::parse($advertising->published_at_expired)->format('Y-m-d'): null),
            [
            'class' => 'form-control',
            'placeholder' => 'Fecha',
            ]
            )
        !!}
    </div>
</div>

<div class="form-group">
    <label for="cover_desktop" class="form-label">@lang('Image for Desktop'):</label>
    {!! Form::file('cover_desktop', ['class' => 'form-control', 'accept' => '.jpg,.jpeg,.png,.gif,.bmp']) !!}
    @if(isset($advertising) && $advertising->cover_desktop)

    @else
    <img src="#" alt="" id="cover_desktop" style="max-width: 50%;" />
    @endif
</div>

<div class="form-group">
    <label for="cover_movil" class="form-label">@lang('Image for Movil'):</label>
    {!! Form::file('cover_movil', ['class' => 'form-control', 'accept' => '.jpg,.jpeg,.png,.gif,.bmp']) !!}
    @if(isset($advertising) && $advertising->cover_movil)

    @else
    <img src="#" alt="" id="cover_movil" style="max-width: 50%;" />
    @endif
</div>




@push('scripts-inline')
<script type="text/javascript">
    var thumbnail = document.getElementById('thumbnail');
	var preview_thumbnail = document.getElementById('cover_desktop');
	var cover = document.getElementById('cover');
	var preview_cover = document.getElementById('cover_movil');
	thumbnail.onchange = evt => {
		const [file] = thumbnail.files;
		if (file)
			preview_thumbnail.src = URL.createObjectURL(file);
	}
	cover.onchange = evt => {
		const [file] = cover.files;
		if (file)
			preview_cover.src = URL.createObjectURL(file);
	}
</script>
@endpush

