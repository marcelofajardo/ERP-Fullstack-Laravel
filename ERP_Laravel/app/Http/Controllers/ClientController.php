<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ClientController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
   $clients = User::where('type', 'client')->get();



  return view('clients.index',compact('clients'));
  }
  public function create(){
      return view('clients.create');
  }


  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      User::create($request->all());

     return redirect()->route('clients.index')->with('success', 'Cliente Creado');;
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
     $user = User::find($id);
     return view('clients.show',compact('user'));
  }



  public function edit($id)
  {
    $user = User::find($id);
    return view('clients.edit',compact('user'));
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
     $user =User::findOrFail($id);
    $user->update($request->all());
    return redirect()->route('clients.index')->with("success"," Cliente Actualizado" );
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {

  }
}
