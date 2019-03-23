<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use View;

class ContactController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function home()
   {
      //
      return view('home');
   }

   public function index()
   {
      //
      return view('contact');
   }

   public function getall()
   {
      $contact = Contact::orderBy('id', 'desc');
      return Datatables::of($contact)
        //  ->setRowAttr(['align' => 'center'])
        ->addColumn('status', function ($contact) {
           return $contact->status ? 'Active' : 'Inactive';
        })
        ->addColumn('created_at', function ($contact) {
           return $contact->created_at->diffForHumans();
        })
        ->addColumn('action', 'action')
        ->setRowClass(function ($contact) {
           return $contact->status ? '' : '';
        })->make(true);
   }


   /**
    * Show the form for creating aUser::query() new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {

      $view = View::make('create')->render();
      return response()->json(['html' => $view]);
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      //
      $request->validate([
        'first_name' => 'required',
        'last_name' => 'required'
      ]);
      $contact = new Contact;

      $contact->first_name = $request->first_name;
      $contact->last_name = $request->last_name;
      $contact->username = $request->username;
      $contact->password = md5($request->password);
      $contact->gender = $request->gender;
      $contact->status = 1;

      $contact->save(); //
      return response()->json(['html' => 'Successfully Inserted']);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Contact $contact
    * @return \Illuminate\Http\Response
    */
   public function show(Contact $contact)
   {
      //
      $view = View::make('view', compact('contact'))->render();

      return response()->json(['html' => $view]);
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Contact $contact
    * @return \Illuminate\Http\Response
    */
   public function edit(Contact $contact)
   {
      //
      // $contact = Contact::where('id',$contact->id);

      // $view = view("ajaxView",compact('title'))->render();
      $view = View::make('edit', compact('contact'))->render();

      return response()->json(['html' => $view]);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request $request
    * @param  \App\Contact $contact
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Contact $contact)
   {
      //
      $contact->first_name = $request->first_name;
      $contact->last_name = $request->last_name;
      $contact->username = $request->username;
      $contact->password = md5($request->password);
      $contact->gender = $request->gender;
      $contact->status = 1;

      $contact->save(); //
      return response()->json(['html' => 'Successfully Updated']);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Contact $contact
    * @return \Illuminate\Http\Response
    */
   public function destroy(Contact $contact)
   {
      //
      $contact->delete();
      return response()->json(['type' => 'success', 'message' => 'Successfully Deleted']);
   }
}
