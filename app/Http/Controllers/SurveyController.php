<?php

namespace App\Http\Controllers;
use App\Models\Survey;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer; 

class SurveyController extends Controller

{
    public function home() {
        return view('welcome');
    }

    public function create() {
        return view('create'); 
    }

    public function addq(Request $saveSurvey) {
        $valid = $saveSurvey->validate([
            'title' => 'required',
        ]);
    
        $rnd = mt_rand(0, 999);
        $survId = time() + $rnd;
    
        $review = new Survey();
        $review->title = $saveSurvey->input('title');
        $review->description = $saveSurvey->input('description');
        $review->id = $survId;
        $review->save(); 
    
        $queArry = $saveSurvey->input('Qtexts'); 
    
        foreach ($queArry as $que) {
            $questionModel = new Question(); 
            $questionModel->question_text = $que;
            $questionModel->survey_id = $survId;
            $questionModel->save(); 
        }
    
        return redirect()->route('home');
    }

    public function loadDB() {
        $loadData = new Survey();
        return view('polls', ['pollsArry' => $loadData->all()]);
    }
    
    public function loadQuestion($surID)
    {
        
        $surve = Survey::find($surID);
    
       
        if (!$surve) {
            abort(404); 
        }
    
        
        $loadQueData = Question::where('survey_id', $surve->id)->get();
    
        return view('surForm', [
            'surveTitle' => $surve->title,
            'surveDesc' => $surve->description,
            'QueArry' => $loadQueData
        ]);
    }

    public function delete($id) {
        $pointToDelete = Survey::find($id);
        if ($pointToDelete) {
            $pointToDelete->delete();
        }
        return redirect()->route('surveyList');
    }

    public function store(Request $request)
    {
        $request->validate([
            'answers' => 'required|array',  
            'answers.*' => 'required|string', 
            'userName' => 'required|string'
        ]);

        $userId = $request->input('userName');

        foreach ($request->answers as $questionId => $answerText) {
            Answer::create([
                'question_id' => $questionId,
                'answer_text' => $answerText,
                'survey_user_id' => $userId, 
            ]);
        }

        return redirect()->route('surveyList')->with('success', 'Ответы успешно сохранены!');
    }

    public function redact($id) {
        $pointToDelete = Survey::find($id);
    
 
        if (!$pointToDelete) {
            return redirect()->route('surveyList')->with('error', 'Опрос не найден.');
        }
    
        $loadQueData = Question::where('survey_id', $id)->get();
    
        return view('redact', [
            'title' => $pointToDelete->title,
            'description' => $pointToDelete->description,
            'QueArry' => $loadQueData,
            'Surid' => $pointToDelete->id
        ]);
    }

    public function replace(Request $saveSurvey) {
        $id = $saveSurvey->input('survey_id');
        $survey = Survey::findOrFail($id);
    
      
        $survey->title = $saveSurvey->input('title');
        $survey->description = $saveSurvey->input('description');
        $survey->save(); 
    
      
        Question::where('survey_id', $survey->id)->delete();
    
     
        $queArry = $saveSurvey->input('Qtexts'); 
    
        foreach ($queArry as $key => $que) {
            
            $questionModel = new Question();
            $questionModel->question_text = $que;
            $questionModel->survey_id = $survey->id; 
            $questionModel->save();
        }
    
        return redirect()->route('home');
    }

    public function showResponses() {
        
        $answers = Answer::with('question')->get();
    
        
        return view('result', compact('answers'));
    }
    


}


