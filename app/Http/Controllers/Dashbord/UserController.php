<?php
namespace App\Http\Controllers\Dashbord;
use App\Http\Requests\Dashbord\Users\Store;
use App\Http\Requests\Dashbord\Users\Update;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Image;
use Storage;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* start of __construct */
    public function __construct(){
        $this->middleware(['permission:create-users'])->only('create');
        $this->middleware(['permission:read-users'])->only('index');
        $this->middleware(['permission:update-users'])->only('edit');
        $this->middleware(['permission:delete-users'])->only('destroy');
    }
    /* end of __construct */
    public function index(Request $request)
    {
        $users = User::whereRoleIs('admin')->where(function($q)use($request){
            return $q->when($request->search,function($query)use($request){
                return $query->where('firstName','like','%' . $request->search . '%')
                ->orWhere('lastName','like','%' . $request->search . '%');
            });

        })->latest()->paginate(5);
        return view('dashbord.users.index',compact('users'));
    }
    //* end of index */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashbord.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        // dd($request->all());
        $request_data = $request->all();
        $request_data = $request->except(['image']);
        $request_data['password'] = bcrypt($request->password);
        /* upload img **/
        if($request->image){
            $img = Image::make($request->image)
            ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/users/' . $request->image->hashName()));
            $request_data['image'] = $request->image->hashName();
        }
        /* upload img **/
        $user = User::create($request_data);
        $user->attachRole('admin');
        $user->syncPermissions($request->permession);
        session()->flash('success',('site.user_created_success'));
        return redirect()->route('dashbord.users.index');


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
        $user = User::findOrFail($id);
        return view('dashbord.users.edit',compact('user'));
    }
    /* end of edit */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, $id)
    {
        $user = User::findOrFail($id);
        $request_data = $request->all();
        if($request->image){
            $img = Image::make($request->image)
            ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/users/' . $request->image->hashName()));
            $request_data['image'] = $request->image->hashName();
        }

        $user->update($request_data);
        $user->syncPermissions($request->permession);
        return redirect()->route('dashbord.users.index');

    }
    /* end of update */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user->image != 'img.jpg'){
            Storage::disk('public_uploads')->delete('users/' . $user->image);
        }
        $user->delete($id);
        return redirect()->route('dashbord.users.index');
    }
}
