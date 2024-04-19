@php $count = 1; @endphp
@foreach ($questions as $question)
    <div class="container shadow rounded mt-3 mb-3" style="background-color: #ffffff;">
        <br>
        <h5>{{ $count++ }}.- {{ $question->question }}</h5> <br>
        <div class="row shadow">
            <div class="col-md-12">
                @include('dashboard.quizzes.options._create')
            </div>
            <br><br>
            @include('dashboard.quizzes.options._list')
        </div>

    </div>
    <br>
@endforeach
