<?php


namespace App\Http\Controllers;


use App\Models\Dish;

class MenusController  extends Controller
{
    public function show()
    {
        return view('menus',[
            'dishes' => Dish::all()
        ]);
    }
}
