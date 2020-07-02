<?php

namespace App\Http\Controllers;

use App\Buttons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            die("Could not connect to the database! <br><br> Check settings and if DB is imported successfully! ");
        }

        $buttons = Buttons::getList();
        return view('dashboard',array('buttons' => $buttons));
    }
}
