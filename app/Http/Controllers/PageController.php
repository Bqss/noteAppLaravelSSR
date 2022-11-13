<?php

namespace App\Http\Controllers;

use App\Models\NoteModel;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class PageController extends Controller
{
    public function dashboard(Request $request){
        $notes= null;
        $searchKey =  $request-> query("search") ?? '';
        if($searchKey){
            $notes = NoteModel::where("note_title", "LIKE", "%" .$searchKey."%")->get();
         }
         else{
            $notes =  NoteModel::all();
         }
        return view("pages.dashboard",[
            "notes" => $notes->where("is_archived",false)->where("user_id",Auth::id()),
            "search_key" => $searchKey
        ]);
    }
    public function archive(Request $request) {
        $notes = null;
        $searchKey =  $request->query("search") ?? '';

        if ($searchKey) {
            $notes = NoteModel::where("note_title", "LIKE", "%" . $searchKey . "%")->get();
        }
        else{
            $notes =  NoteModel::all();
        };
        return view("pages.archive",[
            "notes" => $notes->where("user_id", Auth::id())->where("is_archived", true),
            "search_key" => $searchKey 
        ]);
    
    }
}
    