<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Storage;
use Alert;
use DB;
use File;
use Exception;
use App\Repositories\InterfaceRepository\UserRepositoryInterface;
use App\Repositories\InterfaceRepository\RoleRepositoryInterface;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    protected $userRepository;
    protected $roleRepository;

    public function __construct( UserRepositoryInterface $userRepository, RoleRepositoryInterface $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getUsers = $this->userRepository->load('roles');
  
        return view('admin.user.index', compact('getUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roleRepository->pluck('name', 'id');

        return view('admin.user.add', compact('roles', 'roleList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try {
            $data = $request->all();
           
           if ($request->avatar) {

                if ($request->hasFile('avatar')) {
                $request->avatar->store(config('site.user.image'));
                $data[ 'avatar' ] = $request->avatar->hashName();

               }else {
                    $img_avatar = $request->avatar;
                    $result = $this->userRepository->ImageUpdate($img_avatar);
                    $data['avatar'] =  $result;

                }
           }
            $users = $this->userRepository->create($data);

            $userId = $this->userRepository->findOrFail($users->id);

            if ($request->role_id) {
                $arrayRole = rtrim($request->role_id, ',');
                $check = explode(',', $arrayRole);
                $userId->roles()->attach($check);
            }
            Alert::success(trans('config.successfully'), trans('config.addSuccess'));

            return redirect()->route('user.index');

        } 
        catch (Exception $e) {

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editUser = $this->userRepository->find($id);
        $roleList = $editUser->roles;
        $roles = $this->roleRepository->pluck('name', 'id');
      
        return view('admin.user.edit', compact('editUser', 'roles', 'roleList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {

        try {
            $updateUser = $this->userRepository->find($id);

            if (!empty($request->avatar)) {
                
                $data = $request->all();

                if ($request->hasFile('avatar')) {
                    Storage::delete(config('site.user.image') . $updateUser->avatar);
                    $request->avatar->store(config('site.user.image'));
                    $data['avatar'] = $request->avatar->hashName();
                } else {
                    $img_avatar = $request->avatar;
                    $result = $this->userRepository->ImageUpdate($img_avatar);
                    $data['avatar'] = $result;
                }
            }else {
                $data = $request->only('name', 'email', 'address', 'phone', 'status');
            }

            if (!empty($request->role_id)) {
                $arrayRole = rtrim($request->role_id, ',');
                $check = explode(',', $arrayRole);
                $updateUser->roles()->sync($check);
            }else {
                
                $updateUser->roles()->sync($request->role_id);
            }

            $this->userRepository->update($data, $id);

            return redirect()->route('user.index'); 

        } catch (Exception $e) {
            
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->userRepository->delete($id);

        return response()->json($data);
    }


}
