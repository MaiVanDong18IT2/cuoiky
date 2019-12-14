<?php

namespace App\Http\Controllers;

use App\DatLich;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\San;
use App\Quan;
use Carbon\Carbon;

class MyController extends Controller
{
    public function getdangnhap() {
        return view('dangnhap');
    }


    //Route Quan:
    public function indexQuan($idQuan) {

        $quan = Quan::find($idQuan);
        $data = Quan::find($idQuan)->data()->get();
        
        return view('layouts.mainDatsan', compact('data'), compact('quan'));
    } 
    

    //Route San chi tiet: 
    public function indexSan($idSan, Request $request) {

        $df = [
            '6h00 - 7h30',
            '7h30 - 9h00',
            '9h00 - 10h30',
            '15h00 - 16h30',
            '16h30 - 18h00',
            '18h00 - 19h30',
            '19h30 - 21h00',
            '21h00 - 22h30',
        ];

        $now = Carbon::now('Asia/Ho_Chi_Minh'); 
        // $date = DatLich::where('date' , $now->toDateString())->get();
        
        $get = San::find($idSan);

        return view('function.indexSan', compact('get', 'now', 'df'));
    }
    
    public function getDate(Request $request, $idSan) {

        $arr1 = [
            '6h00 - 7h30',
            '7h30 - 9h00',
            '9h00 - 10h30',

            '15h00 - 16h30',
            '16h30 - 18h00',
            '18h00 - 19h30',
            '19h30 - 21h00',
            '21h00 - 22h30',
        ];

        $get = DatLich::where('idSan', $idSan)->where('date', $request->date)->get()->all();  
        $arr2 = [];
        $date = $request->date;

        foreach( $get as $key=>$value ){
            $arr2[] = $value->time;
        }
        
        $df = array_diff($arr1, $arr2);

        $now = Carbon::now('Asia/Ho_Chi_Minh'); 
        $get = San::find($idSan);
        $name = $get->tenSan;

        return view('function.indexSan', compact('get', 'now', 'df', 'date', 'name'));
    }


    public function pushData(Request $request){

        $date = $request->date;
        $name = $request->name;
        $time = $request->time;
        $id = $request->id;
        
        return view('function.book', compact('date', 'name', 'time', 'id'));
    }

    public function store(Request $request)
    {
        $new = new DatLich;
        $new->idUser = '1';
        $new->idSan = $request->san;
        $new->tenKH = $request->tenKH;
        $new->sdt = $request->sdt;
        $new->date = $request->date;
        $new->time = $request->time;
        $new->note = $request->note;

        $new->save();
        
        echo "Đã đặt sân thành công";
        echo " <a href='http://localhost/cuoiky/' >   Về trang chủ </a>";
    }

}
