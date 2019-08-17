<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Term extends Model
{
    protected $fillable = [
        'name',
        'content',
        'published_at'
    ];

    //return the most recently published term_id
    public static function last_term_id() {
        if(!Term::all()->count()) {
            return '';
        }
        $last_term = DB::table('terms')->orderBy('published_at', 'DESC')->first();
        if($last_term->published_at) {
            return $last_term->id;
        }
        return '';
    }
}
