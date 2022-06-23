@extends('layouts.dashboard.blog')

@section('dashboard-content')

    @include('dashboard.quotes.partials._header', ['subtitle' => 'Citas » Todo'])

    @include('partials.dashboard.messages')

    <div class="table-responsive">
        <table class="table table-hover table-bordered" data-order='[[ 1, "desc" ]]'>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Creado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Título</th>
                    <th>Creado</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($quotes as $quote)
                    <tr>
                        <td>{{ $quote->title }}</td>
                        <td data-order="{{ $quote->created_at->timestamp }}">{{ $quote->present()->created_at }}</td>
                        <td>
                            <a href="{{ route('dashboard.quotes.edit', $quote->id) }}" class="btn btn-sm btn-outline-primary">@lang('Edit')</a>
                            {!! Link::delete('Remover', ['route' => ['dashboard.quotes.destroy', $quote->id]]) !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><!-- .table -->
    </div><!-- .table-responsive -->

@endsection
