@extends('layouts.profile')

@push('styles')
<link href="{{ url('css/etapa1.css') }}" rel="stylesheet" />
@endpush

@push('styles-inline')
<style>
#profile-qdplay a {
color: black;
}
</style>
@endpush

@section('profile-content')

    <div class="tab-pane active" id="profile-articles" role="tabpanel">
        <h3 class="home__title home__title--danger">
            {{ $user->present()->fullname }}
            <span class="small text-muted">({{ $user->articles->count() }})</span>
        </h3>

        <div class="row mb-4">
            @foreach($user->articles as $article)
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mb-5">
                    @include('partials.articles.card', ['article' => $article])
                </div>
            @endforeach
        </div>
    </div>
	
	<div class="tab-pane" id="profile-qdplay" role="tabpanel">
		<div class="row">
			@foreach ($courses as $course)
			<div class="video-card col-md-4 col-sm-6 col-12 mb-4">
				@include('qd:qdplay::home.partials._courseCard', ['course' => $course])
			</div>
			@endforeach
		</div>
	</div>

@endsection

@push('scripts')
<script type="text/javascript" src="{{ url('js/etapa1.js') }}"></script>
@endpush