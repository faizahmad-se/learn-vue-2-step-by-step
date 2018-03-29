<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projects;

class ProjectsController extends Controller
{
    public function index()
    {
    	return view('projects');
    }    

    public function all()
    {
    	return Projects::all();
    }

    public function store()
    {
    	$this->validate(request(), [
    		'name' => 'required',
    		'description' => 'required'
    	]);

    	$project = Projects::create([
    		'name' => request('name'),
    		'description' => request('description')
    	]);

    	return ['message' => 'Project created!!', 'project' => $project];
    }
}
