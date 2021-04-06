<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Repositories\Admin\Gym\GymInterface;
use App\Repositories\Admin\GymAdmin\GymAdminInterface;
use App\Repositories\Admin\Role\RoleInterface;
use App\Http\Requests\Admin\GymAdminRequest;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;

class GymAdminController extends BaseController
{
    protected $user;
    protected $role;
    protected $gym;

    public function __construct(
        GymAdminInterface $user,
        RoleInterface $role,
        GymInterface $gym)
    {
        $this->user = $user;
        $this->role = $role;
        $this->gym = $gym;
    }

    public function getIndex(Request $request)
    {
        $this->resp = $this->user->getPaginatedList($request);

        return view('admin.gym-admin.index')
            ->withTriggers($this->resp->data);
    }

    public function getCreate(Request $request) {

        return view('admin.gym-admin.create')
        ->withRole($this->role->getList())
        ->withGym($this->gym->getList());
    }

    public function postStore(GymAdminRequest $request)
    {
        $this->resp = $this->user->postStore($request);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEdit(Request $request, $id)
    {
        $this->resp = $this->user->getShow($id);

        if (!$this->resp->status) {
            return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
        }

        return view('admin.gym-admin.edit')
        ->withUser($this->resp->data)
        ->withRole($this->role->getList())
        ->withGym($this->gym->getList());

    }

    public function putUpdate(GymAdminRequest $request, $id)
    {
        $this->resp = $this->user->postUpdate($request, $id);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getDelete($id)
    {
        $this->resp = $this->user->delete($id);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }


}
