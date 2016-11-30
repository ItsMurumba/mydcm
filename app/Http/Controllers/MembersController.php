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
        $users = User::select(['id', 'username', 'email', 'county_id','roles_id']);
//        $users = DB::select(DB::raw('SELECT u.id, u.username, u.email, c.name, R.role FROM users u JOIN county c ON c.id=u.county_id JOIN roles R ON R.id=u.roles_id '));


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
