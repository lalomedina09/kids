<table width="100%" border="0" cellpadding="0" cellspacing="0" class="concepts" style="text-align: left;">
    <thead>
        <tr>
            <th>#</th>
            <th>@lang('User ID')</th>
            <th>@lang('User')</th>
            <th>@lang('Name')</th>
            <th>@lang('Last Name')</th>
        </tr>
    </thead>
    <tbody>
         @php $count = 1; @endphp
        @foreach($data as $user)
            <tr>
                <td>{{ $count++ }}</td>
                <td>{{ $user->id }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->last_name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
