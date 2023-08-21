<?php

namespace App\Http\Controllers;

use Illuminate\Http\{Request, Response};

use DB;
use PDF;
use Auth;
use Carbon\Carbon;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\QdpCollaborationsViewsData;
class QdPlayReportsController extends Controller
{

    public function collaboration_views_pdf(Request $request)
    {
        $user = Auth::user();

        $result = $this->collaboration_views();
        $view = 'partials.profiles.components.qdplay-reports.users-views';
        $filename = 'Vistas-de-colaboradores' . '.pdf';
        $now = Carbon::now();

        return $view = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
        ->loadView($view, ['result' => $result, 'user' => $user, 'now' => $now])->stream();
        return $view->download($filename);
    }

    public function collaboration_views_excel(Request $request)
    {
        $result = $this->collaboration_views();

        return Excel::download(new QdpCollaborationsViewsData($var = 'sinData', $result), 'registro-de-vistas-por-colaborador.xlsx');
    }

    public function collaboration_views()
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

        return $result = DB::select(DB::raw($query), [':holder_id' => $user->id]);

    }

}
