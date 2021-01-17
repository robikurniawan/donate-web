<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UsersController extends Controller
{

    public function index(Request $request)
    {
        return view('pages.admin.users.index');
    }

    public function json()
    {
        $data = User::where('role','!=','superadmin')->get();

        return Datatables::of($data)
            ->addIndexColumn()

            ->addColumn('action', function($row){
                $editUrl = url('users/edit/'.$row->id);
                $reset = url('users/reset/'.$row->id);
                $btn = '<a href="'.$editUrl.'" data-toggle="tooltip"  data-original-title="Reset Password" class="edit btn btn-outline-primary btn-sm mr-1"><i class="fa fa-lock-open"></i> Reset Password</a>';
                $btn .= '<a href="'.$editUrl.'" data-toggle="tooltip"  data-original-title="Edit" class="edit btn btn-warning btn-sm"><i class="uil-edit-alt"></i> Edit</a>';
                $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Hapus" class="btn btn-danger btn-sm delete"><i class="uil-trash"></i> Hapus</a>';
                return $btn;
            })

            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        return view('pages.admin.users.create');
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'jabatan' => $request->jabatan,
            'email' => $request->email,
            'password' => Hash::make('12345'),
            'role' => $request->role,
            'sub_role' => $request->sub_role,
        ]);

        return redirect()->route('users.index')->with('success','User created successfully.');
    }


    public function edit(Request $request, $id)
    {
        $data['user'] = User::where('id', $id)->first();
        return view('pages.admin.users.edit',$data);
    }


    public function reset(Request $request, $id)
    {
        $data['user'] = User::where('id', $id)->first();
        return view('pages.admin.users.reset',$data);
    }


    public function resetProcess(Request $request, $id)
    {
        $data = array('password' => Hash::make('12345'));
        User::where('id', $request->id)->update($data);
        return redirect()->route('users.reset', $request->id )->with('success','Reset Password successfully.');
    }


    public function update(Request $request, User $id)
    {
        $data = request()->validate([
            'name' => 'required',
            'jabatan' =>'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        User::where('id', $request->id)->update($data);
        return redirect()->route('users.index')->with('success','User updated successfully.');
    }

    public function destroy($id)
    {
        $data = User::where('id', $id)->delete();
        return response()->json(array('status' => "true",'action'=> 'delete','message' => "User deleted successfully" , $data ));
    }


    public function login()
    {
        return view('auth.login');
    }


    public function isLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required' ,'password'  => 'required' ,'role'  => 'required'
        ]);

        if ($validator->fails()) {
            $role = $request->role;
            if(!Auth::guard($role)->attempt($request->only('email','password'))){
                return redirect()
                    ->back()
                    ->withErrors(' Email atau Password Salah, Silahkan coba lagi  !!  ')
                    ->withInput($request->except('password'));
            }else{

                return redirect()
                    ->back()
                    ->withErrors('Gagal Login !! Captcha Salah ');
            }

        }

        $role = $request->role;
        if(Auth::guard($role)->attempt($request->only('email','password'))){
            return redirect()->intended(route('dashboard'));
        }

        return $this->loginFailed();

    }



    private function loginFailed(){
        return redirect()
            ->back()
            ->withInput()
            ->withErrors('Login failed, please try again!');
    }

    public function logout()
    {
        Auth::guard('masyarakat')->logout();
        return redirect()
            ->route('homepage')
            ->with('status','Admin has been logged out!');
    }

}
