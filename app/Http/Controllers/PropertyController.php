<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request){
        $query = Room::query();

        if ($request->has('type_id') && !empty($request->type_id)) {
            $query->where('type_id', $request->type_id);
        }

        if ($request->has('status_id') && !empty($request->status_id)) {
            $query->where('room_status_id', $request->status_id);
        }

        $rooms = $query->with('image')->with('type')->with('roomStatus')->get();
        $types = \App\Models\Type::all(); // Assuming you have a RoomType model
        $statuses = \App\Models\RoomStatus::all(); // Assuming you have a RoomStatus model

//        dd($rooms);

        return view('property.index', [
            'rooms' => $rooms,
            'types' => $types,
            'statuses' => $statuses
        ]);
    }

    public function show($id){
        $room = Room::with('image')->with("type")->with("roomStatus")->find($id);
        return view('property.show', [
            'room' => $room
        ]);
    }
}
