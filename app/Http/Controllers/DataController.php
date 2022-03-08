<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Data;
use DB;

class DataController extends Controller
{
    //
    public function index()
    {
        $title = "Company List";
        $users = User::where('role', 'Member')->paginate(10);

        $data = [
            'title' => $title,
            'users' => $users,
        ];
        return view('admin', $data);
    }

    public function getData($id)
    {
        $title = "Company Data Detail";
        $user = DB::table('users')
                ->join('data', 'users.id', '=', 'data.user_id')
                ->where('users.id', '=', $id)
                ->first();
        
        $data = [
            'title' => $title,
            'user' => $user,
        ];
        // dd($data);
        return view('data', $data);
    }

    public function createData()
    {
        $title = "Add New Company Data";
        return view('add_data', ['title' => $title]);
    }

    public function editData($id)
    {
        $title = "Edit Company Data";
        $user = DB::table('users')
                ->join('data', 'users.id', '=', 'data.user_id')
                ->where('users.id', '=', $id)
                ->first();

        $data = [
            'title' => $title,
            'user' => $user,
        ];

        return view('edit_data', $data);
    }

    public function deleteData($id)
    {
        Data::where('user_id', '=', $id)->delete();
        User::find($id)->delete();

        return redirect()->route('index')->with('success','Data deleted successfully.');
    }
}
