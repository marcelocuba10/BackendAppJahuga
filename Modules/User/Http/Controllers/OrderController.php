<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Entities\Order;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::all();
        return response()->json($orders);
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'categoryId' => 'required',
            'date' => 'nullable',
            'status' => 'required',
            'userId' => 'nullable',
            'address' => 'nullable'
        ]);

        $order = Order::create([
            'title' => $request->title,
            'description' => $request->description,
            'categoryId' => $request->categoryId,
            'date' => $request->date,
            'status' => $request->status,
            //'userId'=>$request->userId,
            //'address'=>$request->address,
        ]);

        return response()->json($order);
    }

    public function update(Request $request, Order $order)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'categoryId' => 'required',
            'date' => 'nullable',
            'status' => 'required',
            'userId' => 'nullable',
            'address' => 'nullable'
        ]);

        $order->update([
            'title' => $request->title,
            'description' => $request->description,
            'categoryId' => $request->categoryId,
            'date' => $request->date,
            'status' => $request->status,
            'userId' => $request->userId,
            'address' => $request->address,
        ]);

        return response()->json($order);
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json($order);
    }
}
