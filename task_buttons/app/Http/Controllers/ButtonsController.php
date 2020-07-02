<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Colors;
use App\Buttons;

class ButtonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buttons = Buttons::getList();
        return view('buttons.index',array('buttons' => $buttons));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $btn_id = $request->get('btn_id');
        $colors = Colors::getList();

        return view('buttons.create',array('colors' => $colors, 'btn_id' => $btn_id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = Buttons::normalize($request->all());
        $validator = Buttons::validate($requestData);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput($requestData);
        }
        else{
            Buttons::set($requestData);
        }

        return redirect()->action('DashboardController@index')->with('success', 'Button is set successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $button = Buttons::getButton($id);
        $colors = Colors::getList();
        return view('buttons.edit',array('button' => $button, 'colors' => $colors, 'id'=>$id));
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
        $requestData = Buttons::normalize($request->all());
        $validator = Buttons::validate($requestData);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput($requestData);
        }
        else{
            Buttons::modify($requestData, $id);
        }

        return redirect()->action('ButtonsController@index')->with('success', 'Button was modified successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Buttons::remove($id);
        return redirect()->action('ButtonsController@index')->with('success', 'Button was removed successfully!');
    }
}
