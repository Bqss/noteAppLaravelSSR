<?php

namespace App\Http\Controllers;

use App\Models\NoteModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{



    public function create(Request $request)
    {
        $validation = [
            "title" => "required ",
            "body" => "required | min:10"
        ];

        $validate = $request->validate($validation);

        NoteModel::create([
            "note_title" => $request->title,
            "note_text" => $request->body,
            "user_id" => Auth::id(),
            "is_archived" => false
        ]);

        return redirect("/")->with("msg", "the note is susccesfully added");
    }
    public function delete(Request $request)
    {
        $id = (int)$request->id;
        NoteModel::where("note_id", $id)->delete();
        return redirect("/")->with("msg", "The note is succesfully deleted");
    }

    public function detail(Request $request) {
        $id = (int) $request->id;
        $note = NoteModel::where("note_id",$id)->first();

        return view("pages/detail",[
            "note" => $note
        ]);
    }

    public function addToArchive(Request $request){
        $id = (int) $request -> query("id");
         NoteModel::where("note_id",$id)->update(['is_archived' => true]);
        return redirect(route("dashboard"));
    }

    
}
