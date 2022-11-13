<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteModel extends Model
{
    use HasFactory;
    protected $table = "note";
    protected $primaryKey = "note_id";
    public $incrementing = true;
    protected $fillable = ["note_title", "note_text","user_id","is_archived"];
}
