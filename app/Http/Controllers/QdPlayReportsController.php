<?php

namespace App\Http\Controllers;

use Illuminate\Http\{Request, Response};

use App\Models\{Article, Cover, Podcast, Quote, Video};
use PDF;
use DB;
use QD\Advice\Models\Advice;
use App\Models\Quiz;
use App\Models\QzAnswer;
use QD\QDPlay\Models\Course;
use App\Models\QzQuestion;
use App\Models\QzOption;

class QdPlayReportsController extends Controller
{

    public function collaboration_views(Request $request)
    {
        //$user = Auth::user();
        /*
        $startDate = $year . '-' . $month . '-01'  . ' 00:00:00';
        $endTime = '' . ' 23:59:59';
        $_endDate = Carbon::parse($startDate)->format('Y-m-t');
        $endDate = $_endDate . $endTime;

        $date = array(
            'start' => $startDate,
            'end' => $endDate
        );
        */
        //dd('linea 33 ontrolador de reportes');
        /*
        $getMoves = TsBudget::where('user_id', $user->id)->get();
        $moves =  BudgetTrait::dataAllMoves($getMoves, $date);

        $view = 'partials.profiles.components.tools.components.budget.components.pdf.moves-v2';
        $filename = 'Movimientos-' . $month . '-' . $year . 'pdf';

        $view = PDF::loadView($view, ['year' => $year, 'month' => $month, 'moves' => $moves, 'user' => $user]);

        return $view->download($filename);
        */
        /*
        $query = 'SELECT cv.video_id, v.length, MIN(vt.start) min_start, MAX(vt.end) max_end, SUM(vt.length) total_length FROM qdp_courses_qdp_videos cv
            INNER JOIN qdp_videos v ON v.id = cv.video_id
            LEFT JOIN qdp_views vw ON vw.user_id = :user_id AND vw.video_id = cv.video_id
            LEFT JOIN qdp_viewing_times vt ON vt.view_id = vw.id
            WHERE cv.course_id = :course_id GROUP BY cv.video_id, v.length';
        */
        $query = 'SELECT
    views.user_id,
    users.name,
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
        #$result = DB::select(DB::raw($query));
        //$result = DB::select(DB::raw($query), [':user_id' => 1584]);
        $result = DB::select(DB::raw($query), [':holder_id' => 16389]);
        dd($query, $result);
    }

}
