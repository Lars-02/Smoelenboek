<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\Expertise;
use App\Models\Hobby;
use App\Models\LearningLine;
use App\Models\Lectorate;
use App\Models\Minor;
use App\Models\Role;
use App\Models\WorkDay;
use Illuminate\Http\Request;

class SubFilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        $departments = Department::all();
        $expertises = Expertise::all();
        $hobbies = Hobby::all();
        $learningLines = LearningLine::all();
        $lectorates = Lectorate::all();
        $minors = Minor::all();
        $roles = Role::all();
        $workDays = WorkDay::all();
        return view('subfilter', compact(["courses", "departments", "expertises", "hobbies", "learningLines", "lectorates", "minors", "roles", "workDays"]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$filter)
    {
        Info("request->name =");
        Info($request->name);
        $name = $request->name;

        switch($filter) {
            case "expertises":
                $subfilter = new Expertise;
                break;
            case "courses":
                $subfilter = new Course;
                $subfilter->term=0;
                break;
            case "departments":
                $subfilter = new Department;
                break;
            case "hobbies":
                $subfilter = new Hobby;
                break;
            case "learningLines":
                $subfilter = new LearningLine;
                break;
            case "lectorates":
                $subfilter = new Lectorate;
                break;
            case "minors":
                $subfilter = new Minor;
                break;
            case "roles":
                $subfilter = new Role;
                break;
            default:
                $subfilter = null;
                break;
        }

        if ($subfilter != null){
            $subfilter->name = $name;
            $subfilter->save();
        }

        return redirect()->route('subfilter.index')->with('success', 'De subfilter is succesvol toegevoerd!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($filter,$id,Request $request)
    {   
        Info("name is :");
        Info($request->name);
        $name = $request->name;

        switch($filter) {
            case "expertises":
                $subfilter = Expertise::find($id);
                break;
            case "courses":
                $subfilter = Course::find($id);
                break;
            case "departments":
                $subfilter = Department::find($id);
                break;
            case "hobbies":
                $subfilter = Hobby::find($id);
                break;
            case "learningLines":
                $subfilter = LearningLine::find($id);
                break;
            case "lectorates":
                $subfilter = Lectorate::find($id);
                break;
            case "minors":
                $subfilter = Minor::find($id);
                break;
            case "roles":
                $subfilter = Role::find($id);
                break;
            default:
                $subfilter = null;
                break;
        }

        if ($subfilter != null){
            $subfilter->name = $name;
            $subfilter->save();
        }
        return redirect()->route('subfilter.index')->with('success', 'De subfilter is succesvol aangepast!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
       switch ($request->name)
       {
           case 'courses':
               Course::destroy($id);
               break;
           case 'departments':
               Department::destroy($id);
               break;
           case 'expertises':
               Expertise::destroy($id);
               break;
           case 'hobbies':
               Hobby::destroy($id);
               break;
           case 'learningLines':
               LearningLine::destroy($id);
               break;
           case 'lectorates':
               Lectorate::destroy($id);
               break;
           case 'minors':
               Minor::destroy($id);
               break;
           case 'roles':
               Role::destroy($id);
               break;
           case 'workDays':
               WorkDay::destroy($id);
               break;

       }
        return redirect()->route('subfilter.index')->with('success', 'De subfilter is succesvol verwijderd!');
    }
}
