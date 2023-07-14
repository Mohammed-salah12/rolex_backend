<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\repositories\RoleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $this->authorize('viewAny-role');
        $roles=Role::withCount('permissions')->latest()->paginate(5);
        return $this->generateResponse('index' , compact('roles'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create-role');
        return $this->generateResponse('create');

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
        $response = $this->generateSweetAlertResponse('success');
        return $response;
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete-role');
        $roles = $this->roleRepository->findId($id);
        $roles = $this->roleRepository->delete($id);


    }

    function generateResponse($action, $data = [])
    {

        $view = 'cms.spatie.role.' . $action;
        return response()->view($view, $data);
    }

    function generateSweetAlertResponse($status)
    {
        $response = [];

        if ($status === 'success') {
            $response['icon'] = 'success';
            $response['title'] = 'Worked successfully';
            $responseCode = 200;
        } else {
            $response['icon'] = 'error';
            $response['title'] = 'Something went wrong ';
            $responseCode = 400;
        }

        return response()->json($response, $responseCode);
    }
}
