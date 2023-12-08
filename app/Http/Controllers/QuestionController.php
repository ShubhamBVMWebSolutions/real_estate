<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Question;

class QuestionController extends Controller
{
    public function fetchInsert()
    {
        $response = Http::get('https://quizapi.io/api/v1/questions',[
            'apiKey' =>'wu5lCCX4lsKGXXbQVLxatFjVKLQ50Qi1TkGuO4G5',
            'limit' => 10,
        ]);
        $response=json_decode($response->body());

        foreach ($response as $key => $q) {
            $question = new Question();
            $question->question = $q->question;
            $question->answer_a = $q->answers->answer_a;
            $question->answer_b = $q->answers->answer_b;
            $question->answer_c = $q->answers->answer_c;
            $question->save();
        }
        return "Data Fetched And Saved";
    }

    public function show()
    {
        $data['question']=Question::all();
        return view('show',$data);
    }
}
