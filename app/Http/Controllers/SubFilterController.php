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
    public function create(Request $request)
    {
        $identifier = $request->identifier;
        $name = $request->name;

        $subfilter = null;

        switch($identifier) {
            case "expertise":
                $subfilter = new Expertise;

                break;
            case "course":
                $subfilter = new Course;
                break;
            case "department":
                $subfilter = new Department;
                break;
            case "hobby":
                $subfilter = new Hobby;
                break;
            case "learningLine":
                $subfilter = new LearningLine;
                break;
            case "lectorate":
                $subfilter = new Lectorate;
                break;
            case "minor":
                $subfilter = new Minor;
                break;
            case "role":
                $subfilter = new Role;
                break;
        }

        if ($subfilter != null){
            $subfilter->name = $name;
            $subfilter->save();
        }
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
    public function edit($id,Request $request)
    {
        $identifier = $request->identifier;
        $name = $request->name;

        $subfilter = null;

        switch($identifier) {
            case "expertise":
                $subfilter = Expertise::find($id);
                break;
            case "course":
                $subfilter = Course::find($id);
                break;
            case "department":
                $subfilter = Department::find($id);
                break;
            case "hobby":
                $subfilter = Hobby::find($id);
                break;
            case "learningLine":
                $subfilter = LearningLine::find($id);
                break;
            case "lectorate":
                $subfilter = Lectorate::find($id);
                break;
            case "minor":
                $subfilter = Minor::find($id);
                break;
            case "role":
                $subfilter = Role::find($id);
                break;
        }

        if ($subfilter != null){
            $subfilter->name = $name;
            $subfilter->save();
        }
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
