<?php

namespace App\Console\Commands;

use App\Term;
use App\UserTerm;
use Illuminate\Console\Command;

class DeleteRedundantTerms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'term:delete_redundant';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete published terms, which are not the Currently Accepted Terms of any users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $terms = Term::all();
        $count = 0;
        foreach ($terms as $term) {
            if($term->published_at){
                $published_terms_id[] = $term->id;
            }
        }
        foreach ($published_terms_id as $published_term_id) {
            if(UserTerm::where('term_id', $published_term_id)->get()->isEmpty()) {
                Term::destroy($published_term_id);
                $count++;
            }
        }
        error_log($count . " term(s) deleted");
    }
}
