<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTerm extends Model
{
    protected $table = 'user_term';

    protected $fillable = [
        'user_id',
        'term_id'
    ];

    //if user accepted the last terms, return true
    public static function is_accepted($id) {
        $lastTermId = Term::last_term_id();
        $result = UserTerm::where('user_id', $id)->where('term_id', $lastTermId)->get();
        if($result->isEmpty()) {
            return false;
        }
        return true;
    }

    public static function last_accepted_term($id) {
        if($result = UserTerm::where('user_id', $id)->orderBy('created_at', 'DESC')->first()){
            return $result;
        } else {
            return '';
        }
    }
}
