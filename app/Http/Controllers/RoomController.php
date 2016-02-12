<?php

namespace App\Http\Controllers;


use App\Models\Room;
use App\Http\Requests;
use Illuminate\Http\Request;


class RoomController extends Controller{
    public function __construct()
    {
        //attach auth middleware, if user not authenticated forward to login page
        //$user=Auth::user();
        $this->middleware('auth');
    }

    public function showRoom(){
        $rooms = Room::all();
        return view('admin.viewroom')->with('rooms',$rooms);
    }

    public function editRoom(Request $request){
        $id=$request['id_ruang'];
        $room=Room::find($id);
        $room->nama_ruang = $request['nama_ruang'];
        $room->lokasi = $request['lokasi'];
        $room->save();

        return $this->showRoom();
    }
}