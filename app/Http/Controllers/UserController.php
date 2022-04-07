<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function list()
    {
        $users =  User::all();
        return response()->json(["response" => $users ,'success'=>true], 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ];
        $response = array('response' => '', 'success' => false);
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();
            $response['success'] = true;
            $response['response'] = "User Created";
        }

        return $response;
    }

    public function getUserById($id){
        try {
            $user= User::FindOrFail($id);
            return response()->json(["response" => $user ,'success'=>true], 200);
        } catch (\Exception $e) {
            return response()->json(['response'=>'user not found!','success'=>false],404);
        }
    }

    public function update(Request $request,$id){
        $rules = [
            'name' => 'required|min:4',
            'email' => 'unique:users,email,'.$id,
        ];
        $response = array('response' => '', 'success' => false);
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        } else {
            try {
                $user= User::FindOrFail($id);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->save();
                $response['success'] = true;
                $response['response'] = "User Updated";
                return response()->json(["response" => $response ,'success'=>true], 200);
            } catch (\Exception $e) {
                return response()->json(['response'=>'user not found!','success'=>false],404);
            }
        }
        return $response;
    }

    public function destroy($id){
        try {
            $user= User::FindOrFail($id);
            $user->delete();
            return response()->json(["response" => 'User Deleted' ,'success'=>true], 200);
        } catch (\Exception $e) {
            return response()->json(['response'=>'user not found!','success'=>false],404);
        }
    }

    public function getuser()
    {
        $users = User::all();
        return view("admin", compact("users"));
    }
    public function addUser(Request $request)
    {
        $data = $request->all();
        $status = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

        ]);

        return response()->json([
            "ResponseError" => $status
        ]);
    }
    public function updateUser(Request $request)
    {
        $data = $request->all();
        User::where("id", "=", $data['id'])->update([
            'name' => $data['name'],
            'email' => $data['email'],

        ]);

        return response()->json([
            "ResponseError" => "sdsa"
        ]);
    }
    public function deleteUser(Request $request)
    {
        $data = $request->all();
        User::where("id", "=", $data['id'])->delete();

        return response()->json([
            "ResponseError" => "sdsa"
        ]);
    }
}
