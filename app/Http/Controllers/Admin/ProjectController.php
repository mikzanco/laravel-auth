<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;

use App\Http\Requests\UpdateProjectRequest;
use App\Models\Projects;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Projects::orderBy('id', 'desc')->paginate(10);
        $direction = 'desc';
        return view('admin.projects.index', compact('projects', 'direction'));
    }

    public function orderby($column, $direction){

        $direction = $direction === 'desc' ? 'asc' : 'desc';
        $projects = Projects::orderby($column, $direction)->paginate(10);

        return view('admin.projects.index', compact('projects', 'direction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $route = route('projects.store');
        // $method = 'POST';
        // $projects = null;
        // $title = 'Nuovo Progetto';
        return view('admin.projects.create',  );
        // compact('route', 'method', 'title')
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {

        $project_data = $request->all();
        $project_data['slug'] = Projects::generateSlug($project_data['name']);

        $new_project = new Projects();
        $new_project->fill($project_data);
        $new_project->save();

        return redirect()->route('admin.projects.show', $new_project)->with('message', 'Progetto creato correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projects $projects
     * @return \Illuminate\Http\Response
     */
    public function show(Projects $projects)
    {
        return view('admin.projects.show', compact('projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projects $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(Projects $projects)
    {
        return view('admin.projects.edit', compact('projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateRequest  $request
     * @param  \App\Models\Projects $projects
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Projects $projects)
    {
        $project_data = $request->all();
        if($project_data['name'] != $projects->name ){
            $project_data['slug'] = Projects::generateSlug($project_data['name']);

        }else{
            $project_data['slug'] = $projects->slug;
        }
        $projects->update($project_data);
        return redirect()->route('admin.projects.show', $projects)->with('message', 'Progetto aggiornato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projects $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projects $projects)
    {
        $projects->delete();

        return redirect()->route('admin.projects.index')->with('delete', 'Progetto eliminato');
    }
}
