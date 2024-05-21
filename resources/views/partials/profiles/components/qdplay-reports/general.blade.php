@extends('layouts.pdf-qdplay-reports-v2')

@section('title', 'Movimientos')

@section('content')
    {{--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}

    <span style="text-transform: uppercase; font-weight: bold;">Reporte:</span> QD Play
    <br>
    <span style="text-transform: uppercase; font-weight: bold;">Administrador:</span> {{ $user->fullname }}
    <br>
    <span style="text-transform: uppercase; font-weight: bold;">Generado:</span> {{ $now->format('Y-m-d g:i A') }}

    <!---------------------------------------------->
    @php
    // code here to avoid to change ProfileController in queridodinero/base
    \QD\QDPlay\Models\Subscription::getFullInfoByUser($user,
    $current_subscription, $is_subscribed,
    $is_individual, $is_couple, $is_familiar, $is_business,
    $is_collaborator, $is_administrative_collaborator, $holder);

    if ($is_subscribed || $is_administrative_collaborator) {
    $cards = \QD\QDPlay\Models\Card::getByUser($user)->orderBy('id', 'DESC')->get();
    }

    if ($is_subscribed || $is_collaborator) {
    $my_followed_networks = \QD\QDPlay\Models\Network::followedByUser($user)->get();
    $my_history = \QD\QDPlay\Models\Course::lastViewedByUser($user);
    $my_badges = \QD\QDPlay\Models\Badge::getAllByUser($user)->get();
    $my_interests = \QD\QDPlay\Models\Knowledge::getByUser($user)->get();
    $my_completed_courses = \QD\QDPlay\Models\Course::completedByUser($user);
    }

    if ($is_couple) {
    $my_partner = \QD\QDPlay\Models\Collaboration::getByHolder($user)->first();
    } elseif ($is_familiar) {
    $my_family = \QD\QDPlay\Models\Collaboration::getByHolder($user)->get();
    } elseif ($is_business) {
    $my_collaborations_stats = \QD\QDPlay\Models\Collaboration::getStatsByHolder($user)->first();
    $my_collaborations_offset = intval(request('cols_page', '1'),10) - 1;
    $my_collaborations = \QD\QDPlay\Models\Collaboration::getByHolder($user)
    ->offset($my_collaborations_offset)->limit(100)
    ->get();
    $my_networks = \QD\QDPlay\Models\Network::ownedByUser($user)->get();
    $histories = [];
    $advances_per_collaborator = [];
    foreach ($my_collaborations as $collaboration) {
    if (!($collaboration->collaborator instanceof \App\Models\User))
    continue;
    $histories[$collaboration->collaborator_id]= \QD\QDPlay\Models\Course::lastViewedByUser($collaboration->collaborator);
    $advances_per_collaborator[$collaboration->collaborator_id]= \QD\QDPlay\Models\ViewingTime::
    progressOfMandatoryCoursesByHolderCollaborator($user, $collaboration->collaborator);
    }
    $date = request('year', date('Y')) . '-' . request('month', date('m')) . '-01';
    $time_per_day = \QD\QDPlay\Models\ViewingTime::viewingTimePerDayByHolderMonth($user, $date);
    $progress_per_area = \QD\QDPlay\Models\ViewingTime::progressOfMandatoryCoursesPerAreaByHolder($user, $date);
    $most_watched_categories = \QD\QDPlay\Models\View::mostWatchedCategoriesByHolderMonth($user, $date);
    $mandatory_courses = \QD\QDPlay\Models\MandatoryCourse::getByHolder($user)->get();
    $courses_with_mandatory = \QD\QDPlay\Models\Course::getWithMandatoryByHolder($user)->get();
    $mandatory_videos_count = 0;
    foreach ($mandatory_courses as $mandatory_course)
    $mandatory_videos_count+= $mandatory_course->course->videos()->count();
    } elseif ($is_administrative_collaborator) {
    $my_collaborations_stats = \QD\QDPlay\Models\Collaboration::getStatsByHolder($holder);
    $my_collaborations_offset = intval(request('cols_page', '1'),10) - 1;
    $my_collaborations = \QD\QDPlay\Models\Collaboration::getByHolder($holder)
    ->offset($my_collaborations_offset)->limit(100)
    ->get();
    $my_networks = \QD\QDPlay\Models\Network::ownedByUser($holder)->get();
    $histories = [];
    $advances_per_collaborator = [];
    foreach ($my_collaborations as $collaboration) {
    if (!($collaboration->collaborator instanceof \App\Models\User))
    continue;
    $histories[$collaboration->collaborator_id]= \QD\QDPlay\Models\Course::lastViewedByUser($collaboration->collaborator);
    $advances_per_collaborator[$collaboration->collaborator_id]= \QD\QDPlay\Models\ViewingTime::
    progressOfMandatoryCoursesByHolderCollaborator($holder, $collaboration->collaborator);
    }
    $date = request('year', date('Y')) . '-' . request('month', date('m')) . '-01';
    $time_per_day = \QD\QDPlay\Models\ViewingTime::viewingTimePerDayByHolderMonth($holder, $date);
    $progress_per_area = \QD\QDPlay\Models\ViewingTime::progressOfMandatoryCoursesPerAreaByHolder($holder, $date);
    $most_watched_categories = \QD\QDPlay\Models\View::mostWatchedCategoriesByHolderMonth($holder, $date);
    $mandatory_courses = \QD\QDPlay\Models\MandatoryCourse::getByHolder($holder)->get();
    $courses_with_mandatory = \QD\QDPlay\Models\Course::getWithMandatoryByHolder($holder)->get();
    $mandatory_videos_count = 0;
    foreach ($mandatory_courses as $mandatory_course)
    $mandatory_videos_count+= $mandatory_course->course->videos()->count();
    }

    if (!($current_subscription instanceof \QD\QDPlay\Models\Subscription) ||
    $current_subscription->is_canceled) {
    $invitations_collaborations = \QD\QDPlay\Models\Collaboration::getInvitationsByCollaborator($user)->get();
    $available_subscriptions = \QD\QDPlay\Models\Subscription::availableByUser($user)->get();
    }

    $reserved_gift_codes = \QD\QDPlay\Models\GiftCode::getReservedByUser($user)->get();

    if ($user->hasRole('exhibitor')) {
    $my_landing_pages = \QD\QDPlay\Models\LandingPageTest::getByExhibitor($user)->get();
    }
    @endphp

    <!---------------------------------------------->
    <div id="qdplay-reports" class="tab-pane small">

        {{-- @include('partials.profiles.components.qdplay-reports.components.general.data')¨ --}}

        <div class="" style="background-color: #eee;" id="budget-section-year-report">
            {{-- @include('partials.profiles.components.tools.components.budget.view-year.pre-load._year_body') --}}
        </div>

        @include('partials.profiles.components.qdplay-reports.components.general.horas-por-dia')

        @include('partials.profiles.components.qdplay-reports.components.general.areas')

        @include('partials.profiles.components.qdplay-reports.components.general.5-temas')

    </div>
    <!---------------------------------------------->

    {{--
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var year = {{ $year }};
        var user = {{ $user }};
        var barChartData = {
            labels: year,
            datasets: [{
                label: 'User',
                backgroundColor: "pink",
                data: user
            }]
        };

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: '#c1c1c1',
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Yearly User Joined'
                    }
                }
            });
        };
</script>
--}}

@endsection
