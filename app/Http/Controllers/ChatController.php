<?php

namespace App\Http\Controllers;
use App\Message, App\User, Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
use Illuminate\Http\Request;

class ChatController extends Controller
{
  public function fetch($talkingTo)
  {
    $user = Auth::user();
    
    if ($user->isTutor()) {
      return Message::where('tutor_id', $user->id)
                      ->where('student_id', $talkingTo)
                      ->with('student.user')->get();
    }
    else {
      return Message::where('student_id', $user->id)
                      ->where('tutor_id', $talkingTo)
                      ->with('tutor.user')->get();
    }
  }

  public function send(Request $request)
  {
    $user = Auth::user();
    
    if ($user->isTutor()) {
      $message = Message::create([
        'message' => $request->input('message'),
        'student_id' => $request->input('other_id'),
        'tutor_id' => $user->id,
        'tutor_sent' => true
      ]);
      $tutor = $user->tutor;
      $student = User::find($request->input('other_id'))->student;
    }
    else {
      $message = Message::create([
        'message' => $request->input('message'),
        'tutor_id' => $request->input('other_id'),
        'student_id' => $user->id,
        'tutor_sent' => false
      ]);
      $tutor = User::find($request->input('other_id'))->tutor;
      $student = $user->student;
    }
  
    broadcast(new MessageSent($user, $message))->toOthers();
    return ['status' => 1];
  }
}
