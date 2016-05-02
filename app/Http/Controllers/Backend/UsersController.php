<?php

namespace cms\Http\Controllers\Backend;

use cms\User;
use Illuminate\Http\Request;
use cms\Http\Requests;
use League\Flysystem\Exception;

class UsersController extends Controller
{
    /**
     * @var user
     */
    protected $user;

    /**
     * UsersController constructor.
     * @param User $users
     */
    public function __construct(User $users)
    {
        $this->users = $users;

        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $users = $this->users->paginate(10);

        return view('backend.users.index',compact('users'));
    }
    public function create(User $user)
    {
        return view('backend.users.form',compact('user'));
    }
    public function store(Requests\StoreUserRequest $request)
    {
        $this->users->create($request->only('name','email','password'));
        return redirect(route('backend.users.index'))->with('status','User has been created');
    }
    public function edit($id)
    {
        try{
            $user = $this->users->findOrFail($id);
            return view('backend.users.form',compact('user'));
        }catch (\Exception $e){
            return redirect()->back()->withErrors([
               'error' => 'Couldnot Find A matching Record'
            ]);
        }
    }
    public function update(Requests\UpdateUserRequest $request, $id)
    {
        $user = $this->users->findOrFail($id);
        $user->fill($request->only('name','email','password'))->save();
        return redirect(route('backend.users.index'))->with('status','User has been Updated');
    }
    public function confirm(Requests\DeleteUserRequest $request, $id)
    {
        $user = $this->users->findOrFail($id);
        return view('backend.users.confirm',compact('user'));
    }
    public function destroy(Requests\DeleteUserRequest $request, $id)
    {
        $user = $this->users->findOrFail($id);
        $user->delete();
        return redirect(route('backend.users.index'))->with('status','User Has been deleted !');
    }

}
