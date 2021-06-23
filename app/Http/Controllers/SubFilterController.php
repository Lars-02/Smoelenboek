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
        $user = auth()->user();

        if($user != null && $user->isAdmin() != null){
            $courses = Course::all();
            $departments = Department::all();
            $expertises = Expertise::all();
            $hobbies = Hobby::all();
            $learningLines = LearningLine::all();
            $lectorates = Lectorate::all();
            $minors = Minor::all();
            $roles = Role::all();
            return view('subfilter', compact(["courses", "departments", "expertises", "hobbies", "learningLines", "lectorates", "minors", "roles"]));
        }
        else if($user != null)
            return redirect()->route('home');

        return redirect()->route('auth.login');

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$filter)
    {
        $name = $request->name;

        switch($filter) {
            case "expertises":
                if (!Expertise::where('name', '=', $name)->exists()) {
                    $subfilter = new Expertise;
                 } 
                break;
            case "courses":
                if (!Course::where('name', '=', $name)->exists()) {
                    $subfilter = new Course;
                    $subfilter->term=0;
                 }              
                break;
            case "departments":
                if (!Department::where('name', '=', $name)->exists()) {
                    $subfilter = new Department;
                 }
                break;
            case "hobbies":
                if (!Hobby::where('name', '=', $name)->exists()) {
                    $subfilter = new Hobby;
                 }
                break;
            case "learningLines":
                if (!LearningLine::where('name', '=', $name)->exists()) {
                    $subfilter = new LearningLine;
                 }
                break;
            case "lectorates":
                if (!Lectorate::where('name', '=', $name)->exists()) {
                    $subfilter = new Lectorate;
                 }
                break;
            case "minors":
                if (!Minor::where('name', '=', $name)->exists()) {
                    $subfilter = new Minor;
                 }
                break;
            case "roles":
                if (!Role::where('name', '=', $name)->exists()) {
                    $subfilter = new Role;
                 }
                break;
        }

        if (isset($subfilter)){
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
        $name = $request->name;

        switch($filter) {
            case "expertises":
                if (!Expertise::where('name', '=', $name)->exists()) {
                    $subfilter = Expertise::find($id);
                 } 
                break;
            case "courses":
                if (!Course::where('name', '=', $name)->exists()) {
                    $subfilter = Course::find($id);
                 }              
                break;
            case "departments":
                if (!Department::where('name', '=', $name)->exists()) {
                    $subfilter = Department::find($id);
                 }
                break;
            case "hobbies":
                if (!Hobby::where('name', '=', $name)->exists()) {
                    $subfilter = Hobby::find($id);
                 }
                break;
            case "learningLines":
                if (!LearningLine::where('name', '=', $name)->exists()) {
                    $subfilter = LearningLine::find($id);
                 }
                break;
            case "lectorates":
                if (!Lectorate::where('name', '=', $name)->exists()) {
                    $subfilter = Lectorate::find($id);
                 }
                break;
            case "minors":
                if (!Minor::where('name', '=', $name)->exists()) {
                    $subfilter = Minor::find($id);
                 }
                break;
            case "roles":
                if (!Role::where('name', '=', $name)->exists()) {
                    $subfilter = Role::find($id);
                 }
                break;
        }

        if (isset($subfilter)){
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
       }
        return redirect()->route('subfilter.index')->with('success', 'De subfilter is succesvol verwijderd!');
    }
}
