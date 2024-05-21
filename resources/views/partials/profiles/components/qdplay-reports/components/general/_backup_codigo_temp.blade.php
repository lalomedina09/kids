@php
    //dd(request('date', date('Y-m-d')));
    // code here to avoid to change ProfileController in queridodinero/base
    \QD\QDPlay\Models\Subscription::getFullInfo($user->id,
    $current_subscription, $i_am_subscribed,
    $i_am_individual, $i_am_couple, $i_am_familiar, $i_am_business,
    $i_am_collaborator, $i_am_collaborator_administrator, $holder_id);

    if ($i_am_subscribed || $i_am_collaborator_administrator) {
    $cards = \QD\QDPlay\Models\Card::getByUser($user);
    }

    if ($i_am_subscribed || $i_am_collaborator) {
    $my_history = \QD\QDPlay\Models\Course::lastViewedByUser($user->id);
    $my_badges = \QD\QDPlay\Models\Badge::getAll($user->id);
    $my_interests = \QD\QDPlay\Models\Knowledge::getByUser($user);
    $my_completed_courses = \QD\QDPlay\Models\Course::completedByUser($user);
    }

    if ($i_am_collaborator) {
    $my_holder = \App\Models\User::find($holder_id)->first();
    }

    if ($i_am_couple) {
    $my_partner = \QD\QDPlay\Models\Collaboration::getFirstByHolder($user);
    } elseif ($i_am_familiar) {
    $my_family = \QD\QDPlay\Models\Collaboration::getByHolder($user);
    } elseif ($i_am_business) {
    $my_collaborations = \QD\QDPlay\Models\Collaboration::getByHolder($user);
    $my_networks = \QD\QDPlay\Models\Network::ownedByUser($user);
    $histories = [];
    $advances_per_collaborator = [];
    foreach ($my_collaborations as $collaboration) {
    $histories[$collaboration->collaborator_id]=
    \QD\QDPlay\Models\Course::lastViewedByUser($collaboration->collaborator_id);
    $advances_per_collaborator[$collaboration->collaborator_id]= \QD\QDPlay\Models\ViewingTime::
    progressOfMandatoryCoursesByHolderCollaborator($user->id, $collaboration->collaborator_id);
    }
    $date = request('date', date('Y-m-d'));
    //$date = "2023-07-23";
    $time_per_day = \QD\QDPlay\Models\ViewingTime::viewingTimePerDayByHolderMonth($user, $date);
    $progress_per_area = \QD\QDPlay\Models\ViewingTime::progressOfMandatoryCoursesPerAreaByHolder($user->id, $date);
    $most_watched_categories = \QD\QDPlay\Models\View::mostWatchedCategoriesByHolderMonth($user->id, $date);
    $mandatory_courses = \QD\QDPlay\Models\MandatoryCourse::getByHolder($user);
    $courses_with_mandatory = \QD\QDPlay\Models\Course::getWithMandatoryByUser($user);
    $mandatory_videos_count = 0;
    foreach ($mandatory_courses as $mandatory_course)
    $mandatory_videos_count+= $mandatory_course->course->videos()->count();
    } elseif ($i_am_collaborator_administrator) {
    $my_collaborations = \QD\QDPlay\Models\Collaboration::getByHolder($my_holder);
    $my_networks = \QD\QDPlay\Models\Network::ownedByUser($my_holder);
    $histories = [];
    $advances_per_collaborator = [];
    foreach ($my_collaborations as $collaboration) {
    $histories[$collaboration->collaborator_id]=
    \QD\QDPlay\Models\Course::lastViewedByUser($collaboration->collaborator_id);
    $advances_per_collaborator[$collaboration->collaborator_id]= \QD\QDPlay\Models\ViewingTime::
    progressOfMandatoryCoursesByHolderCollaborator($holder_id, $collaboration->collaborator_id);
    }
    $date = request('date', date('Y-m-d'));
    $time_per_day = \QD\QDPlay\Models\ViewingTime::viewingTimePerDayByHolderMonth($my_holder, $date);
    $progress_per_area = \QD\QDPlay\Models\ViewingTime::progressOfMandatoryCoursesPerAreaByHolder($holder_id, $date);
    $most_watched_categories = \QD\QDPlay\Models\View::mostWatchedCategoriesByHolderMonth($holder_id, $date);
    $mandatory_courses = \QD\QDPlay\Models\MandatoryCourse::getByHolder($my_holder);
    $courses_with_mandatory = \QD\QDPlay\Models\Course::getWithMandatoryByUser($my_holder);
    $mandatory_videos_count = 0;
    foreach ($mandatory_courses as $mandatory_course)
    $mandatory_videos_count+= $mandatory_course->course->videos()->count();
    } else {
    $invitations_collaborations = \QD\QDPlay\Models\Collaboration::invitationsByCollaborator($user);
    $reserved_subscriptions = \QD\QDPlay\Models\Subscription::reservedByUser($user);
    $reserved_gift_codes = \QD\QDPlay\Models\GiftCode::getReservedByUser($user);
    }
    dd('por aqui anda el pedillo');
@endphp
