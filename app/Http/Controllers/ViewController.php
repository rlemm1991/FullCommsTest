<?php
/**
 * Created by PhpStorm.
 * User: Get-d
 * Date: 15/11/2018
 * Time: 12:21
 */

namespace App\Http\Controllers;


class ViewController extends Controller
{

    public function __construct()
    {
        // No really applicable unless middleware is going to be used
        // purposes of demo Auth middleware not needed
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loadViewIndex()
    {
        return view('index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loadViewForm()
    {
        return view('form');
    }

    public function loadViewThanks()
    {
        return view('thanks');
    }

}
