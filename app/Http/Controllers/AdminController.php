<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\repositories\AdminRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{

    /**
     * @var AdminRepository
     */
    private $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $admins=$this->adminRepository->getLatestAdminsWithPaginate();
      $roles=Role::all();
        $this->authorize('viewAny' , Admin::class);
        return $this->generateResponse('index' , compact('admins' , 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admins=$this->adminRepository->getPage();
        $roles = Role::where('guard_name', 'admin')->get();
        $this->authorize('create', Admin::class);
        return $this->generateResponse('create', compact('admins', 'roles'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        $data = $request->validated();
        $admins = Admin::create($data);
        $roles = Role::findOrFail($request->input('role_id'));
        $admins->roles()->sync([$roles->id]);;
        $response = $this->generateSweetAlertResponse('success');
        return $response;

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admins=$this->adminRepository->findId($id);
        $roles = Role::where('guard_name' , 'admin')->get();
        $this->authorize('update' , Admin::class);
        return $this->generateResponse('edit', compact('admins', 'roles'));
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
        $validator = Validator($request->all() , [
            'password' => 'nullable',
        ]);

        if(! $validator->fails()){
            $admins=$this->adminRepository->findId($id);
//            $roles = Role::findOrFail($request->get('role_id'));
//            $admins->assignRole($roles->name);
            $admins->gmail = $request->get('gmail');
            $isSaved = $admins->save();

            if($isSaved){

                return ['redirect'=>route('admins.index')];

            }
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] ,400);
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
        $this->authorize('delete' , Admin::class);
        $this->adminRepository->findId($id);
        $this->adminRepository->delete($id);
    }


    function generateResponse($action, $data = [])
    {
        $view = 'cms.admins.' . $action;
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
