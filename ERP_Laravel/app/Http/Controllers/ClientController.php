<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mail;


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



    return view('clients.index', compact('clients'));
  }
  public function create()
  {
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

    $validated = $request->validate([
      'name' => 'required|max:255',
      'email' => 'required|email',
      'address' => 'required|string|max:255',
      'cif_nif' => 'required|string|max:12',
      'type' => 'required',
      'image' => 'required|string|max:255',
      'password' => 'required|min:8'
    ]);
    User::create($request->all());

    $email_data = array(
        'name' => $request->name,
        'email' => $request->email,
    );

    // send email with the template
    Mail::send('welcome_mail', $email_data, function ($message) use ($email_data) {
        $message->to($email_data['email'], $email_data['name'])
            ->subject('Welcome to ShopERP')
            ->from('laraveldemo249@gmail.com', 'ShopERP');
    });

     return redirect()->route('clients.index')->with('success', 'Cliente Creado');;
  }

   /**
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $user = User::find($id);
    return view('clients.show', compact('user'));
  }



  public function edit($id)
  {
    $user = User::find($id);
    return view('clients.edit', compact('user'));
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
    $user = User::findOrFail($id);
    $validated = $request->validate([
      'name' => 'required|max:255',
      'email' => 'required|email',
      'address' => 'required|string|max:255',
      'cif_nif' => 'required|string|max:12',
      'type' => 'required',
      'image' => 'required|string|max:255',
      'password' => 'required|min:8',
    ]);
    $user->update($request->all());
    return redirect()->route('employees.index')->with("success", "Cliente Actualizado");
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->route('clients.index')->with("success", " Cliente Eliminado");
  }
}
