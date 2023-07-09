<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\repositories\RoleRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * @var Role
     */
    private $role;
    /**
     * @var RoleRepository
     */
    private $roleRepository;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   public function __construct(RoleRepository $roleRepository)
   {
       $this->roleRepository = $roleRepository;
   }

    public function index()
    {
        $roles=Role::latest()->paginate(5);
        return response()->view('cms.spatie.role.index' , compact('roles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return response()->view('cms.spatie.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( RoleRequest $request)
    {
      Role::create($request->validated());
      return response()->json(['icon'=>'success' , 'title'  => 'created succsefully' , 200]);
    }

    /**

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = $this->roleRepository->findId($id);
        return response()->view('cms.spatie.role.edit' , compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {

      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roles = $this->roleRepository->findId($id);
        $roles = $this->roleRepository->delete($id);

    }
}
