<?php

namespace App\Http\Controllers;

use Illuminate\Http\{ Request, Response };

use App\Models\{ Article, Cover, Podcast, Quote, Video };

use QD\Advice\Models\Advice;
use App\Models\Quiz;
use App\Models\FormContact;
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

        return redirect()->back()->with('success', 'Quiz enviado con exito');
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
        // Obtener 2 cursos aleatorios
        $randomCourses = Course::whereHas('custoMfreeVideos')->whereNotNull('thumbnail')->inRandomOrder()->limit(2)->get();

            // Obtener el artículo más reciente y los 2 artículos anteriores más recientes
            $latestArticle = Article::published()->latest()->where('site', env('SITE_ARTICLES', "queridodinero.com"))->first();
        $previousArticles = Article::published()->where('id', '!=', $latestArticle->id)
            ->latest()
            ->where('site', env('SITE_ARTICLES', "queridodinero.com"))
            ->limit(2)->get();

        // Pasar la información a la vista
        return view('v2.home.index')->with([
            'randomCourses' => $randomCourses,
            'latestArticle' => $latestArticle,
            'previousArticles' => $previousArticles,
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

    public function agencyRedesign()
    {
        return view('v2.home.agency-creative')->with([
            'categories' => 0,
            'channel' => 0,
            'source' => 0
        ]);
    }

    public function contacto()
    {
        return view('v2.home.contact')->with([
            'categories' => 0,
            'channel' => 0,
            'source' => 0
        ]);
    }

    public function saveDataContact(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'motivo' => 'required|string|max:200',
            'mensaje' => 'required|string|max:200',

            'company' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'nullable|string|max:255',
            'job_position' => 'nullable|string|max:255',
            'g-recaptcha-response' => 'required|recaptcha',
        ]);

        $newModel = new FormContact();
        $newModel->name = $data['nombre'] . ' ' . $data['apellidos'];
        $newModel->phone = $data['telefono'];
        $newModel->email = $data['email'];
        $newModel->subject = $data['motivo'];
        $newModel->message = $data['mensaje'];

        $newModel->company = $data['company'] ?? null;
        $newModel->address = $data['address'] ?? null;
        $newModel->job_position = $data['job_position'] ?? null;
        $newModel->save();

        return redirect()->back()->with('success', 'Solicitud enviada correctamente');
    }


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
