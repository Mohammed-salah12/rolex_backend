<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequset;
use App\repositories\PermissionRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    /**
     * @var PermissionRepository
     */
    private $permissionRepository;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny-permission');
        $permissions=$this->permissionRepository->getLatestPermissionsWithPaginate();
        return $this->generateResponse('index' , compact('permissions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create-permission');
        $this->permissionRepository->getPage();
        return $this->generateResponse('create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequset $request)
    {
        Permission::create($request->validated());
        $response = $this->generateSweetAlertResponse('success');
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete-permission');
        $permission = $this->permissionRepository->findId($id);
        $permission = $this->permissionRepository->delete($id);

    }

    public function deletedPermissions()
    {
        $deletedPermissions = Permission::onlyTrashed()->get();

        return view('cms.spatie.permission.deleted-permissions', compact('deletedPermissions'));
    }
    public function restore($id)
    {
        $record = Permission::withTrashed()->findOrFail($id);
        $record->restore();
        return redirect()->route('permissions.index');
    }

    public function forceDelete($id)
    {
        $record = Permission::withTrashed()->findOrFail($id);
        $record->forceDelete();
        return redirect()->route('permissions.index');


    }
    function generateResponse($action, $data = [])
    {
        $view = 'cms.spatie.permission.' . $action;
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
