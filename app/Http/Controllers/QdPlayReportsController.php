<?php

namespace App\Http\Controllers;

use Illuminate\Http\{Request, Response};
use App\Models\User;
use DB;
use PDF;
use Auth;
use Carbon\Carbon;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\QdpCollaborationsViewsData;
use App\Exports\QdpCollaborationsProgressData;
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

    public function general()
    {
        $user = Auth::user();
        $result = $this->collaboration_views();
        $view = 'partials.profiles.components.qdplay-reports.general';
        $filename = 'QD-Play-reporte' . '.pdf';
        $now = Carbon::now();


        return $view = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
        ->loadView($view, [
            'result' => $result,
            'user' => $user,
            'now' => $now
            ])->stream();

        return $view->download($filename);
    }

    public function progress_courses_excel()
    {
        $result = $this->coursesDurationAndDurationViews();

        return Excel::download(new QdpCollaborationsProgressData($var = 'sinData', $result), 'avance-de-colaboradores.xlsx');
    }

    public function coursesDurationAndDurationViews()
    {
        $user = Auth::user();
        $result = DB::table('qdp_views AS views')
        ->leftJoin('qdp_viewing_times AS tiempoVisualizado', 'views.id', '=', 'tiempoVisualizado.view_id')
        ->join('qdp_courses AS curso', 'views.course_id', '=', 'curso.id')
        ->join('qdp_videos AS videos', 'views.video_id', '=', 'videos.id')
        ->leftJoin('users', 'views.user_id', '=', 'users.id')
        ->where('views.holder_id', $user->id)
        ->select(
            'views.holder_id AS administrador',
            'views.user_id',
            'curso.id',
            'curso.name as curso',
            DB::raw('CONCAT(users.name, " ", users.last_name) AS nombre_completo'),
            'users.email',
            'views.course_id',
            DB::raw('SUM(tiempoVisualizado.length/60) AS min_vistos')
        )
            ->whereNull('videos.deleted_at')
            ->whereNull('curso.deleted_at')
            ->groupBy('views.user_id', 'views.course_id')
            ->orderBy('users.name')
            ->orderBy('curso.name')
            ->get();

        return $result;
    }

    public function progress_courses_pdf(Request $request)
    {
        $user = Auth::user();

        $result = $this->coursesDurationAndDurationViews();
        $view = 'partials.profiles.components.qdplay-reports.progress-courses';
        $filename = 'Avance-de-colaboradores' . '.pdf';
        $now = Carbon::now();

        return $view = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
            ->loadView($view, ['result' => $result, 'user' => $user, 'now' => $now])->stream();
        return $view->download($filename);
    }
}
