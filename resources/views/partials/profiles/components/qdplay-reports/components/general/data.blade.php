@include('partials.profiles.components.qdplay-reports.components.general.data')

<h5 class="text-bold text-uppercase mb-4">Promedio de horas que se le dedica al d&iacute;a:</h5>

<div class="mb-5 row">
    <div class="row hours-graph" style="width: {{ date('t') * 40 }}px;"
    style="width: 100%; display:flex; flex-wrap: wrap; margin-right: -15px; margin-left: -15px;">
        @php/*
			$max_length = 0;
			foreach ($time_per_day as $d)
				if ($d->day_length > $max_length)
					$max_length = $d->day_length;

			$last_day_month = date('t', strtotime(request('date', date('Y-m-d'))));
			$month = date('M', strtotime(request('date', date('Y-m-d'))));
			for ($day = 1; $day <= $last_day_month; ++$day) {
				$day_length = 0;
				foreach ($time_per_day as $d) {
					if ($d->day === $day) {
						$day_length = $d->day_length;
						break;
					}
				}

				echo '<div class="date-bar">';
				if ($day_length > 0) {
					$hours = \QD\QDPlay\Formats::toHours($day_length);
					echo '<div class="bar" style="height:' . (($day_length / $max_length) * 200) . 'px;" title="' . $hours . '">
					<div class="value">' . $hours . '</div>
				</div>';
				} else {
					$hours = '0 hrs';
					echo '<div class="empty-bar">&nbsp;</div>';
				}
				echo '<div class="date" title="' . $hours . '">' . "{$day} - $month" . '</div>';
				echo '</div>';
			}*/
		@endphp
    </div>
</div>

