<?php

namespace App\Http\Controllers;


use App\Models\Room;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = $this->room_validator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $id=$request['id_ruang'];
        $room=Room::find($id);
        $room->nama_ruang = $request['nama_ruang'];
        $room->lokasi = $request['lokasi'];
        $room->daya_tampung = $request['daya_tampung'];
        $room->save();

        return $this->showRoom();
    }

    public function addRoom(){
        return view('admin.addroom');
    }

    public function saveRoom(Request $request){
        $validator = $this->room_validator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $room = new Room;
        $room->nama_ruang = $request['nama_ruang'];
        $room->lokasi = $request['lokasi'];
        $room->daya_tampung = $request['daya_tampung'];
        $room->save();

        return redirect('/viewroom');
    }

    public function deleteRoom(Request $request){
        $input = $request->all();
        $room = Room::find($input['id']);
        $room->delete();
        return $this->showRoom();
    }

    protected function room_validator(array $data)
    {
        $validator = Validator::make($data, [
            'nama_ruang' => 'required|max:255',
            'daya_tampung' => 'numeric',
        ]);

        return $validator;
    }
}