<table>
	<thead>
		<tr>
			<th>@lang('Course')</th>
            <th>@lang('Video')</th>
			<th>@lang('Number of Views')</th>
			<th>@lang('User')</th>
			<th>@lang('Number of Speakers')</th>
			<th>@lang('Length')</th>
			<th>
				@if ($amount->payments->count() > 0)
				@lang('Amount')
				@else
				@lang('Estimated Amount')
				@endif
			</th>
		</tr>
	</thead>
	<tbody>
	@foreach(($estimated_payments ?? $amount->payments) as $payment)
		<tr>
            <td>
                @if (count($payment->video->courses)>0)
                    @foreach ($payment->video->courses as $course)
                        {{ $course->name_large }}
                    @endforeach
                @endif
			</td>
			<td>
				{{ $payment->video->title }}
			</td>
			<td>{{ $payment->num_views }}</td>
			<td>
				@if (is_null($payment->user))
				<a href="{{ route('dashboard.qdplay.videos.show', [$payment->video_id, '#speakers']) }}">@lang('Add Speaker')</a>
				@else
				{{ $payment->user->full_name }}
				@endif
			</td>
			<td>{{ $payment->num_speakers }}</td>
			<td>{{ number_format($payment->length, 2) }}</td>
			<td>{{ number_format($payment->estimated_amount,2) }}</td>
		</tr>
	@endforeach
	</tbody>
</table>
