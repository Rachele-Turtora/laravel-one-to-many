<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        //$img_path = $request->hasFile('cover_img') ? Storage::put('uploads', $data['cover_img']) : NULL;
        $img_path = $request->hasFile('cover_img') ? $request->cover_img->store('uploads') : NULL;

        $project = new Project();

        $project->title = $data['title'];
        $project->description = $data['description'];
        $project->slug = Str::of($project->title)->slug('-');
        $project->cover_img = $img_path;

        $project->save();

        //$project->fill($data);
        //$prject->save();

        return redirect()->route('admin.projects.show', $project->slug)->with('message', 'Progetto creato con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        $data['slug'] = Str::of($project->title)->slug('-');

        $project->update($data);

        return redirect()->route('admin.projects.show', $project->slug)->with('message', 'Progetto modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->cover_img) {
            Storage::delete($project->cover_img);
        }

        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', 'Progetto eliminato con successo');;
    }
}
