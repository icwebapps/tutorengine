<?php

namespace App\Http\Controllers;

use App\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\{User, Assignment, Subject};

class ResourceController extends Controller
{
  public function index() 
  {
    if (Auth::user()->isTutor()) {
       return view('resources');
    }
    else {
      abort(404);
    }
  }

  public function list()
  {
    if (Auth::user()->isTutor()) {
      $resources = User::with('tutor.resources.assignments.student.user')->find(Auth::user()->id)->tutor->resources;
      return json_encode([ "resources" => $resources ]);
    }
    else {
      abort(404);
    }
  }

  public function store(Request $request)
  {
    $file = $request->file;
    $storagePath = Storage::disk('s3')->put('resources/', $file, 'public');
    $url = Storage::url($file);
    $storageName = basename($storagePath);
    $resource = new Resource;
    $resource->url = $url;
    $resource->name = $storageName;
    $resource->tutor_id = Auth::user()->id;
    $resource->save();
    return json_encode(["status" => 1]);
  }

  public function add_student(Request $request, $resourceId) 
  {
    $assignment = new Assignment([
      'student_id' => $request->input('student_id'),
      'subject_id' => Subject::find(1)->id,
      'date_set' => date('Y-m-d'),
      'date_due' => date('Y-m-d'),
      'resource_id' => $resourceId,
      'title' => str_random(10)
    ]);
    
    $assignment->save();
    return json_encode(["status" => 1]);
  }
}
