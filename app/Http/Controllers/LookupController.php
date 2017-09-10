<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LookupController extends Controller
{

    public function index(Request $request)
    {
        return view('home.home', [
            'resolver' => []
        ]);
    }


    public function lookup(Request $request)
    {
        $data = $request->validate([
            'host' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $resolver = new \Redbox\DNS\Resolver();
        $resolver->resolve($data['host']);

        if (count($resolver) == 0) {
            flash('Geen resultaten gevonden', 'danger');
        }

        return view('home.home', [
            'resolver' => $resolver
        ]);
   }

}
