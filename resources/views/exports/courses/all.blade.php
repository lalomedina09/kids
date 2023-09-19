<table class="table table-hover table-bordered" data-order='[[ 0, "asc" ]]'>
    <thead>
        <tr>
            <th>@lang('Name')</th>
            <th>@lang('Videos')</th>
            <th>@lang('Length')</th>
            <th>@lang('Speakers')</th>
            <th>@lang('Level')</th>
            <th>@lang('Categories')</th>
            <th>@lang('Reels')</th>
        </tr>
    </thead>

    <tbody>
        @foreach($data as $course)
            <tr>
                <td>
                    {{ $course->name }}
                </td>
                <td>{{ $course->videos_count }}</td>
                <td>
                    @php $minutes = getDurationForCourse($course->id) @endphp
                    {{ convertNumerToHour($minutes) }}
                </td>
                <td>
                    @foreach ($course->speakers as $speaker)
                    <div>{{ $speaker->full_name }}</div>
                    @endforeach
                </td>
                <td>{{ $course->level }}</td>
                <td>
                    @foreach ($course->categories as $category)
                    {{ $category->name }}<br />
                    @endforeach
                </td>
                <td>
                    @foreach ($course->reels as $reel)
                    {{ $reel->name }}<br />
                    @endforeach
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
