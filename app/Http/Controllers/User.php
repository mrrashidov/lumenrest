<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\UsersModel;
use App\Model\OrderModel;
use App\Http\Helper\ResponseBuilder;
class User extends Controller
{
    public function lists(){
        $data = UsersModel::all();
        $status = true;
        $info = "Data list succesfuly";
       return ResponseBuilder::result($status,$info,$data);
    }

    public function order(Request $request){
        //print_r($request->input());
        $order = new OrderModel;
        $order->id = $request->input('id');
        $order->user_id = $request->input('user_id');
        $order->product_id = $request->input('product_id');
        $order->status = $request->input('status');
        $result = $order->save();
        //$result = 0;
        if ($result == 1){
            $status = true;
            $info = "Data save succesfuly";
        }else{
            $status = false;
            $info = "Data not save";
        }

        return ResponseBuilder::result($status,$info);
    }
}
