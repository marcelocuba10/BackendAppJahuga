<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Entities\Day;
use Modules\User\Entities\Ground;
use Modules\User\Entities\Schedule;

class GroundController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $grounds = Ground::paginate(5);
        return view('user::grounds.index', compact('grounds'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $schedules = Schedule::all();
        $days = Day::all(); 

        return view('user::grounds.create',compact('schedules','days'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100|min:5',
            'price' => 'required',
            'description' => 'required|max:250|min:10',
            'company_id' => 'required',
            'image' => 'nullable',
        ]);

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
        $schedules = Schedule::pluck('name', 'name')->all(); //get only names
        $days = Day::pluck('name', 'name')->all(); //get only names
        //$isSchedule = $ground->roles->pluck('name')->toArray(); //get user assigned role
        $isSchedule='12:00';
        $isDay = 'Lunes';
        return view('user::grounds.edit', compact('ground','days','schedules','isSchedule','isDay'));
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
            'description' => 'required|max:250|min:10',
            'image' => 'nullable',
        ]);

        $ground->update($request->all());

        return redirect()->to('/user/grounds')->with('message', 'Cancha actualiza correctamente');
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
