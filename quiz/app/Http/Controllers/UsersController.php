<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsersModel;
use Exception;
use DB;

class UsersController extends Controller
{
    protected $user;

    public function __construct(UsersModel $user) {
      $this->user = $user;
    }

    public function add(Request $request) {
      $user = [
        "user_id" => $request->user_id,
        "user_name" => $request->user_name,
        "user_email" => $request->user_email,
        "user_password" => md5($request->user_password)
      ];
      try {
        $user = $this->user->create($user);
        return response('User successfully created', 201);
      } catch(Exception $ex) {
        return response($ex, 400);
      }
    }

    public function deleteUser($id) {
      try {
        $userToDelete = $this->user->find($id);
        $userToDelete->delete();
        return response('User deleted successfully', 200);
      } catch(Exception $ex) {
        return response($ex, 401);
      }
    }

    public function updateUser(Request $request, $id) {
      try {
        /*$newId = $request->user_id;
        $newName = $request->user_name;
        $newEmail = $request->user_email;
        $newPass = md5($request->password);
        DB::update('update users set user_id = ?, user_name = ?, user_email = ?,
        user_password = ? where user_id = ?', [$newId, $newName, $newEmail, $newPass, $id]);*/
        $user = $this->user->find($id);
        $user->user_id = $request->user_id;
        $user->user_name = $request->user_name;
        $user->user_email = $request->user_email;
        $user->user_password = md5($request->user_password);
        $user->save();
        return response('User successfully updated', 200);
      } catch(Exception $ex) {
        return response($ex, 401);
      }
    }

    public function showAll() {
      try {
        $users = $this->user->all();
        return $users;
      } catch(Exception $ex) {
        return response($ex, 400);
      }
    }
}
