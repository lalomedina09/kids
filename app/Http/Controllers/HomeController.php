<?php

namespace App\Http\Controllers;

use Illuminate\Http\{ Request, Response };

use App\Models\{ Article, Cover, Podcast, Quote, Video };

use QD\Advice\Models\Advice;
use App\Models\Quiz;
use App\Models\QzAnswer;
use QD\QDPlay\Models\Course;
use App\Models\QzQuestion;
use App\Models\QzOption;
class HomeController extends Controller
{

    public function test(Request $request)
    {
        $user = $request->user();
        $course = Course::where('id', 8)->first();

        $quiz = Quiz::where('quizzesable_type', "QD\QDPlay\Models\Course")->where('quizzesable_id', $course->id)->first();
        $answers = 0;

        //Quiz y usuario con esto sabremos si el usuario ya contesto el quizz
        if ($quiz) {
            $answers = QzAnswer::where('quiz_id', $quiz->id)->where('user_id', $user->id)->get();
        }
        //dd($quiz, $answers);

        //dd($answers);
        return view('test.quiz')->with([
            'quiz' => $quiz,
            'answers' => $answers
        ])->with('success', 'Quiz realizado con exito');
    }

    public function quizCourseSave(Request $request)
    {
        $user = $request->user();
        $answers = $request->answers;

        foreach ($answers as $question => $option) {
            $answer = new QzAnswer;
            $answer->user_id = $user->id;
            $answer->quiz_id = $request->quiz_id;
            $answer->question_id = $question;
            $answer->option_id = $option;
            $answer->save();
        }

        return redirect()->back()->with('success', 'Quiz enviado con exito');;
    }

    /**
     * Main page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $advice_categories = Advice::getCategories()
            ->map(function ($category, $key) {
                $category->load('advisors');
                return $category;
            })
            ->filter(function ($category, $key) {
                return !$category->advisors->isEmpty();
            });
        return view('qd:advice::advisors.index')->with([
            'categories' => $advice_categories
        ]);
    }

    public function indexRedesign()
    {
        return view('v2.home.index')->with([
            'categories' => 0,
            'channel' => 0,
            'source' => 0
        ]);
    }

    public function servicesRedesign()
    {
        return view('v2.home.services')->with([
            'categories' => 0,
            'channel' => 0,
            'source' => 0
        ]);
    }

    public function consultingRedesign()
    {
        return view('v2.home.consultingv2')->with([
            'categories' => 0,
            'channel' => 0,
            'source' => 0
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function blog(Request $request)
    {
        $covers = Cover::shown()->get()->take(6);
        #dd('controlador', $covers);
        $user = $request->user();
        // Save userAgent
        $request = request();
        $user_id = ($user) ? $user->id : null;
        $userAgent = Controller::detectAgent($request, $request->url());
        $saveUserAgent = Controller::saveUserAgent($userAgent, $user_id);
        // End Save UserAgent

        foreach(collect(range(1,6))->diff($covers->pluck('position')->toArray())->values()->all() as $newPosition) {
            $covers->push(Cover::make(['position' => $newPosition]));
        }

        $covers = $covers->sort(function ($cover1, $cover2) {
            return $cover1->position < $cover2->position ? -1 : 1;
        });

        return view('home.index')->with([
            'recommended' => Article::recommended($request->user())->where('site', env('SITE_ARTICLES', "queridodinero.com"))->take(15)->get(),
            'trending' => Article::trending()->where('site', env('SITE_ARTICLES', "queridodinero.com"))->take(6)->get(),
            'latest' => Article::recent()->where('site', env('SITE_ARTICLES', "queridodinero.com"))->take(9)->get(),
            'radio' => Podcast::recent()->take(9)->get(),
            'videos' => Video::recent()->take(9)->get(),
            'covers' => $covers,
            'quote' => Quote::latest()->first(),
        ]);
    }

    /**
     * Resolve old wordpress routes
     *
     * @param  string  $slug
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resolve($slug, Request $request)
    {
        if ($article = Article::where('slug', $slug)->first()) {
            return redirect()->route('articles.show', [$article]);
        }

        if ($podcast = Podcast::where('slug', $slug)->first()) {
            return redirect()->route('podcasts.show', [$slug]);
        }

        if ($video = Video::where('slug', $slug)->first()) {
            return redirect()->route('videos.show', [$slug]);
        }

        abort(Response::HTTP_NOT_FOUND);
    }
}
