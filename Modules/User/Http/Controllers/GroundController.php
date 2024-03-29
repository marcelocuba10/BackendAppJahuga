<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\User\Entities\Ground;

class GroundController extends Controller
{

    public static $days;
    public static $schedules;

    public function __construct()
    {
        self::$days = array("Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo");
        self::$schedules = array("12:00", "14:00", "16:00", "18:00", "20:00", "22:00", "00:00");
    }

    public function index()
    {
        $idRefCurrentUser = Auth::user()->idReference;
        $grounds = DB::table('grounds')
            ->where('grounds.idReference', '=', $idRefCurrentUser)
            ->select('grounds.id', 'grounds.name', 'grounds.description', 'grounds.price', 'grounds.image', 'grounds.day','grounds.schedule','grounds.status')
            ->orderBy('grounds.created_at', 'DESC')
            ->paginate(10);

        return view('user::grounds.index', compact('grounds'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        $days = self::$days;
        $schedules = self::$schedules;

        $ground = null;

        $user = auth()->user();

        return view('user::grounds.create', compact('ground','schedules', 'days', 'user'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|max:100|min:5',
            'price' => 'required',
            'description' => 'nullable|max:250|min:10',
            'day' => 'required',
            'schedule' => 'required',
            'image' => 'nullable',
        ]);

        //$days = $request->get('day');   // array:3 [0 => "1", 1 => "2" , 2 => "3"] 
        //$days = json_encode($request->get('day'));  //  "["1","2","3"]"
        //$days = implode(",", $request->get('day'));   //  "1,2,3"
        //dd($days);

        $request->day = json_encode($request->get('day'));
        $request->schedule = json_encode($request->get('schedule'));

        Ground::create($request->all());

        return redirect()->to('/user/grounds')->with('message', 'Cancha creada correctamente');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('user::grounds.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        

        $ground = Ground::find($id);
        //dd($ground);

        $days_selected = $ground->day;
        $schedules_selected = $ground->schedule;

        $days = self::$days;
        $schedules = self::$schedules;

        return view('user::grounds.edit', compact('ground', 'schedules', 'days', 'days_selected', 'schedules_selected'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Ground $ground)
    {
        $request->validate([
            'name' => 'required|max:100|min:5',
            'price' => 'required',
            'description' => 'nullable|max:250|min:10',
            'day' => 'required',
            'schedule' => 'required',
            'image' => 'nullable',
        ]);

        $request->day = json_encode($request->get('day'));
        $request->schedule = json_encode($request->get('schedule'));

        $ground->update($request->all());

        return redirect()->to('/user/grounds')->with('message', 'Cancha actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $ground = Ground::find($id);

        $ground->delete();

        return redirect()->to('/user/grounds')->with('message', 'Cancha eliminada correctamente');
    }
}
