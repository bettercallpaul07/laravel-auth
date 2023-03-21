<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;


//Helpers
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.projects.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        //qui prendiamo gli input validati
        $data = $request->validated();

        //rendiamo uno slug il titolo importando Str come helpers
        $slug = Str::slug($data["title"]);

        $newProject = Project::create([
            "title" => $data["title"],
            "slug" => $slug,
            "content" => $data["content"],
        ]);

        //oppure
        //$data["slug"] = Str::slug($data["title"]);
        //$newProject = Project::create($data); 

        //facciamo il redirect alla show dopo aver salvato i dati
        return redirect()->route("admin.projects.show", $newProject)->with("success", "Post aggiunto con successo!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view("admin.projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view("admin.projects.edit", compact("project"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */


    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        $data["slug"] = Str::slug($data["title"]);

        $project->update($data);


        return redirect()->route("admin.projects.show", $project->id)->with("success", "Post aggiornato con successo!");
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route("admin.projects.index", $project->id)->with("success", "Progetto eliminato con successo!");

    }
}
