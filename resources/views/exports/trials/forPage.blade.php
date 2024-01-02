<table>
    <thead>
        <tr>
            <th>@lang('Company')</th>
            <th>@lang('Name')</th>
            <th>@lang('Last Name')</th>
            <th>@lang('Email')</th>
            <th>@lang('Plan')</th>
            <th>@lang('Start')</th>
            <th>@lang('End')</th>
            <th>@lang('Days')</th>
            <th>@lang('Is Valid')</th>
        </tr>
    </thead>

    <tbody>
        @foreach($data as $subscription)
        <tr class="{{ $subscription->is_valid ? ($subscription->is_almost_lapsed ? 'almost' : 'ok') : 'invalid' }}">
            <td>{{ is_null($subscription->user) ? 'N/A' : $subscription->user->getMeta('qdplay', 'company') ?? 'N/A' }}
            </td>
            <td>{{ is_null($subscription->user) ? 'N/A' : $subscription->user->name }}</td>
            <td>{{ is_null($subscription->user) ? 'N/A' : $subscription->user->last_name }}</td>
            <td>{{ is_null($subscription->user) ? $subscription->reserved_email : $subscription->user->email }}</td>
            <td>{{ $subscription->plan }}</td>
            <td>{{ $subscription->start }}</td>
            <td>{{ $subscription->end }}</td>
            <td>{{ $subscription->days }}</td>
            <td>@lang($subscription->is_valid ? 'Yes' : 'No')</td>
        </tr>
        @endforeach
    </tbody>
</table>

