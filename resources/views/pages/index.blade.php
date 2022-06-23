@extends('layouts.page')

@push('styles')
    <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
@endpush

@push('styles-inline')
    <style type="text/css">
        #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
    </style>
@endpush

@section('page')

    <div class="text-center">
        <h1 class="text-danger text-uppercase mb-4 legals__title">{{ isset($page) ? $page->present()->title : '' }}</h1>
    </div>

    <div class="legals-content">
        {!! isset($page) ? $page->present()->body : '' !!}
    </div>

@endsection
