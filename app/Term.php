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
        return DB::table('terms')->orderBy('published_at', 'DESC')->first()->id;
    }
}
