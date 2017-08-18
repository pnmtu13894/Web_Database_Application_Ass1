<?php

namespace App\Http\Controllers;

use App\Status;
use App\User;
use Illuminate\Http\Request;
use App\Ticket;
use App\Comment;
use function redirect;
use function view;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $error_types = [

            'Typo/Misspelling',
            'Broken link',
            'Factual error',
            'Problems accessing or viewing the page',
            'Other'
        ];

        $operating_systems = [
            'Windows 7',
            'Windows 8 and 8.1',
            'Windows 10',
            'Windows Vista',
            'Linux',
            'macOS X'
        ];


        return view('user.index', compact('error_types','operating_systems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'first_name'=>'required|max:50',
           'last_name'=>'required|max:50',
           'email'=>'required|unique:users',
           'title'=>'required|max:100',
           'ticket_description'=>'required'
        ]);

        $user = new User;

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;


        $user_name = $request->first_name . " " . $request->last_name;

        $data = [
            'user_name'=> $user_name,
            'operating_system'=> $request->operating_system,
            'issue_title'=>$request->title,
            'error_type'=>$request->error_type,
            'page_url'=>$request->page_url,
            'description'=>$request->ticket_description
        ];

        $user->save();
        $ticket = Ticket::create($data);



        return redirect()->intended();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $ticket = Ticket::findOrFail($id);

//        $ticket->status_id = $request->status_id;
//        $ticket->save();
        $ticket->update($request->all());

        return redirect('/admin');
//        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
