<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Datatable;
use Yajra\Datatables\Datatables;
use App\User;
use Illuminate\Support\Facades\Input;

use App\County;
use App\Role;
use Illuminate\Support\Facades\Session;

class MembersController extends Controller
{
    //
    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */


    public function getIndex()
    {
        $users=User::pluck('username','id');
        $county=County::pluck('county_name','id');
        $role=Role::pluck('role','id');
        return view('members')->with(['users'=> $users,'county'=>$county,'role'=>$role]);

    }
    public function editmember(){
        $UserID=Input::get('users');
        $CountyId=Input::get('county');
        $RoleId=Input::get('role');
        
//        echo $CountyId;
//        die();

        User::where('id', $UserID)->update(array(
            'county_id'    =>  $CountyId,
            'roles_id' =>  $RoleId
        ));

        \Session::flash('message', 'Successfully Updated!');
        return redirect()->action('MembersController@getIndex');
    }
    public function listmembers() {
        $users = User::join('county','county.id','=','users.county_id')
            ->join('roles','roles.id','=','users.roles_id')
            ->select(['users.id', 'users.username', 'users.email', 'county.county_name','roles.role']);

        return Datatables::of($users)->make();

    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return User::of(User::query())->make(true);
    }
}
