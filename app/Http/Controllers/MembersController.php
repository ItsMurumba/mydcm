<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Datatable;
use Yajra\Datatables\Datatables;
use App\User;

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
        return view('members');
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
