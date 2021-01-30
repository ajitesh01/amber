<?php

namespace App\Http\Controllers;

use App\Models\Adds;
use Illuminate\Http\Request;
use App\Models\User;

class AddsController extends Controller
{
    private static   $addType=['bannerAdd','InterstitialAdd','rewardedAdd'];
    private static $contentType=['image','video'];
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "g";
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Type= self::$addType;
        $ContentType=self::$contentType;
        $users=User::all();
        return view('add.create',compact('Type','users','ContentType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $Type=self::$addType[$data['Type']];
        $ContentType=self::$contentType[$data['ContentType']];
        $user_id=$data['user_id'];  
        $role = Adds::create(['title' =>$data['Title'],'adType'=>$Type,'contentType'=>$ContentType,'status'=>$data['status'],'user_id'=>$user_id]);    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Adds  $adds
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $ad= Adds::find($id);
      return view('add.edit',compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Adds  $adds
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad= Adds::find($id);
        $user=User::all();
        return view('add.edit',compact('ad','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Adds  $adds
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ad=Adds::find($id);
        $ad->title=$request->Title;
        $ad->contentType=self::$contentType[$request->contentType];
        $ad->adType=self::$addType[$request->adType];
        $ad->user_id=$request->user;
        $ad->status=$request->status;
        $ad->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adds  $adds
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adds $adds)
    {
        //
    }
}
