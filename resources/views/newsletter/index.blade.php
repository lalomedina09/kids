@extends('layouts.app')

@push('styles')

@endpush

@push('styles-inline')

<script>
    (function(w, d, t, h, s, n) {
    w.FlodeskObject = n;
    var fn = function() {
      (w[n].q = w[n].q || []).push(arguments);
    };
    w[n] = w[n] || fn;
    var f = d.getElementsByTagName(t)[0];
    var v = '?v=' + Math.floor(new Date().getTime() / (120 * 1000)) * 60;
    var sm = d.createElement(t);
    sm.async = true;
    sm.type = 'module';
    sm.src = h + s + '.mjs' + v;
    f.parentNode.insertBefore(sm, f);
    var sn = d.createElement(t);
    sn.async = true;
    sn.noModule = true;
    sn.src = h + s + '.js' + v;
    f.parentNode.insertBefore(sn, f);
  })(window, document, 'script', 'https://assets.flodesk.com', '/universal', 'fd');
</script>
@endpush

@section('content')

<section class="home pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="fd-form-6622ea1126482e1fbcfde7bf"></div>
                <script>
                    window.fd('form', {
                    formId: '6622ea1126482e1fbcfde7bf',
                    containerEl: '#fd-form-6622ea1126482e1fbcfde7bf'
                  });
                </script>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts-inline')

@endpush

