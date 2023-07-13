<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $data = request()->query();
        //return view('thankyou.index');
           dd(request()->query());

        //     $success = $data['success'];

    //    if($success)   return view('thankyou.index');

    //    return view('/');



    }



}
