<?php

namespace App\Http\Controllers\Term;

use App\Http\Controllers\Controller;
use App\Term;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terms = DB::table('terms')->orderBy('published_at', 'DESC')->paginate(5);
        return view('terms.index', compact('terms'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('terms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Term::create($request->all());
        return redirect('terms');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Term  $terms
     * @return \Illuminate\Http\Response
     */
    public function show(Term $terms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Term  $terms
     * @return \Illuminate\Http\Response
     */
    public function edit(Term $term)
    {
        if($term->published_at){
            return "Published terms can't be edited!";
        }
        return view('terms.edit', compact('term'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Term  $terms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Term $term)
    {
        $term->update($request->all());
        return redirect('terms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Term  $terms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Term $term)
    {
        if($term->published_at){
            return "Published terms can't be deleted!";
        }
        $term->delete();
        return redirect('terms');
    }

    public function publish(Term $term)
    {

        if($term->published_at){
            return "Published terms can't be published!";
        }
        $term->published_at = Carbon::now();
        $term->update();


        //Sending email to users about term publication
        $users = User::all();
        foreach ($users as $user){
            $data = array('name'=>$user->name, 'published_at'=>$term->published_at);
            Mail::send('emails/new_term', $data, function($message) use ($user) {
                $message->to($user->email)->subject('New Terms and Conditions');
                $message->from('info@lynxproject.com', 'John Doe');
                sleep(10);
            });
        }

        return redirect('terms');
    }
}
