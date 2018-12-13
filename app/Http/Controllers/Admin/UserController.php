<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Alert;
use Exception;
use App\Repositories\InterfaceRepository\UserRepositoryInterface;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getUsers = $this->userRepository->getAll();
        
        return view('admin.user.index', compact('getUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->only('name', 'email','password', 'avatar', 'address', 'phone', 'status');

           if ($request->hasFile('avatar')) {
                $request->avatar->store(config('site.user.image'));

                $data['avatar'] = $request->avatar->hashName();
            }

            $this->userRepository->create($data);

            return redirect()->route('user.index');

        } catch (Exception $e) {

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
        //
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

        return view('admin.user.edit', compact('editUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $updateUser = $this->userRepository->find($id);

            $data = $request->only('name', 'email', 'avatar', 'address', 'phone', 'status');
            if ($request->hasFile('avatar')) {
                Storage::delete(config('site.user.image') . $updateUser->avatar);
                $request->avatar->store(config('site.user.image'));
                $data['avatar'] = $request->avatar->hashName();
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
