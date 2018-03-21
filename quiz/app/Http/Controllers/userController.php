<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usermodel;
use DB;
use Exception;

class userController extends Controller
{
  protected $user;

  public function __construct(Usermodel $user){
    $this->user = $user;
  }
  //
  public function register(Request $request){
      $user = [
        "name"  => $request->name,
        "email" => $request->email,
        "password" =>$request->password
      ];

      try{
        $user = $this->user->create($user);
        return response('Created',201);
      }catch(Exception $ex){
        return response('Failed',400);
      }
    }

  public function all(){
      $users = $this->user->all();
      return response()->json($users,200);
    //return view("all")->with('users',$users);
  }

  public function find($id){
    $users = $this->user->find($id);
    return $users;
  }

  public function delete($id){
      DB::table('user')->where('id',$id)->delete();
      return response()->json('Deleted',200);
    }

    public function updateUser(Request $request, $id) {
    $newName = $request->name;
    $newEmail = $request->email;
    $newPassword = $request->password;
    DB::update('update user set name = ?, email = ?, password = ? where id = ?', [$newName, $newEmail, $newPassword, $id]);
    return response()->json('updated',200);
  }

}
