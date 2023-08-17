<?php

namespace App\Http\Controllers;

use Illuminate\Http\{Request, Response};

use DB;
use PDF;
use Auth;
use Carbon\Carbon;

class QdPlayReportsController extends Controller
{

    public function collaboration_views(Request $request)
    {
        $user = Auth::user();

        $query = 'SELECT
                views.user_id,
                users.name as user,
                users.last_name as last_name,
                users.email,
                views.course_id,
                courses.name,
                views.total total_views
            FROM
                (SELECT
                    user_id, course_id, COUNT(id) total
                FROM
                    qdp_views
                WHERE
                    user_id IS NOT NULL
                GROUP BY user_id , course_id) views
                    INNER JOIN
                (SELECT
                    collaborator_id
                FROM
                    qdp_collaborations
                WHERE
                    holder_id = :holder_id) collaborators ON collaborators.collaborator_id = views.user_id
                    INNER JOIN
                qdp_courses courses ON courses.id = views.course_id
                    INNER JOIN
                users ON users.id = views.user_id
        ORDER BY user_id , course_id';

        $result = DB::select(DB::raw($query), [':holder_id' => $user->id]);

        $view = 'partials.profiles.components.qdplay-reports.users-views';
        $filename = 'Vistas-de-colaboradores' . '.pdf';
        $now = Carbon::now();
        return $view = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
        ->loadView($view, ['result' => $result, 'user' => $user, 'now' => $now])->stream();
        //$view->render();
        #return $view->stream();
        return $view->download($filename);
    }

}
