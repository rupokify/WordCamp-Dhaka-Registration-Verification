<?php

namespace App\Http\Controllers;

use Mail;
use App\Attendee;
use App\Mail\VerifyAttendee;
use Illuminate\Http\Request;
use \Shipu\MuthoFun\Facades\MuthoFun;

class AttendeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendees = Attendee::all();

        return view('attendees.index', compact('attendees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function show(Attendee $attendee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendee $attendee)
    {
        //
    }

    /**
     * Show the form for verifying the specified resource.
     *
     * @param  \App\Attendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function verify(Attendee $attendee)
    {
        Attendee::whereId($attendee->id)->update([
            'verification_code' => rand(100000, 999999)
        ]);
        $attendee->refresh();
        Mail::to($attendee->email)->send(
            new VerifyAttendee($attendee)
        );
        // Uncomment the following line to activate SMS Verification
        // $sms = MuthoFun::message('WordCamp Dhaka 2019 Verification Code: '.$attendee->verification_code)->to('0'.$attendee->phone)->send();
        $attendee = Attendee::find($attendee->id);
        return view('attendees.verify', compact('attendee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendee $attendee)
    {
        $verification_code = request()->validate([
            'verification_code' => ['required','numeric', 'max:999999', 'min:100000']
        ]);
        if ( in_array($attendee->verification_code, $verification_code, ) )
        {
            $attributes['verified_at'] = now();
            Attendee::whereId($attendee->id)->update($attributes);
            return redirect('/attendees/');            
        } else {
            return redirect()->back()->withErrors(['Verification Code Did Not Match']);
        };

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendee $attendee)
    {
        //
    }
}
