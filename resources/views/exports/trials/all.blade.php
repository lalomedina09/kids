<table class="table table-hover table-bordered" data-order='[[ 3, "desc" ]]'>
    <thead>
        <tr>
            <th>@lang('Company')</th>
            <th>@lang('Name')</th>
            <th>@lang('Last Name')</th>
            <th>@lang('Email')</th>
            <th>@lang('Plan')</th>
            <th>@lang('Dates')</th>
            <th>@lang('Days')</th>
            <th>@lang('Is Valid')</th>
            <th>@lang('Landing Page Test')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($trials as $subscription)
        <tr class="{{ $subscription->is_valid ? ($subscription->is_almost_lapsed ? 'almost' : 'ok') : 'invalid' }}">
            <td>{{ is_null($subscription->user) ? 'N/A' : $subscription->user->getMeta('qdplay', 'company') ?? 'N/A' }}</td>
            <td>{{ is_null($subscription->user) ? 'N/A' : $subscription->user->name }}</td>
            <td>{{ is_null($subscription->user) ? 'N/A' : $subscription->user->last_name }}</td>
            <td>{{ is_null($subscription->user) ? $subscription->reserved_email : $subscription->user->email }}</td>
            <td>{{ $subscription->plan }}</td>
            <td>de {{ $subscription->start }} a {{ $subscription->end }}</td>

            <td>{{ $subscription->days }}</td>
            <td>@lang($subscription->is_valid ? 'Yes' : 'No')</td>
            <td>
                <a href="{{ $subscription->landingPageTest->url }}" target="_blank"> Ver landing </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
