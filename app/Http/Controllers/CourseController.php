<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $course = Course::all();
        return view('course.index', [
            'courses' => $course
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validatedData = $request->validate([
            'name' => 'required|max:255|min:3|unique:courses',
            'description' => 'required|max:500|min:3',
        ]);

        Course::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('course.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $course = Course::findOrFail($course->id);
        return view('course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
          $validatedData = $request->validate([
            'name' => 'required|max:255|min:3',
            'description' => 'required|max:500|min:3',
        ]);

        $course->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course = Course::find($course->id);
        $course->delete();
        return redirect()->route('course.index');
    }
}
