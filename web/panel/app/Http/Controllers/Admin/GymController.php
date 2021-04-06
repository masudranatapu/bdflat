<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Admin\Gym\GymInterface;
use App\Traits;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\GymRequest;

class GymController extends BaseController
{
    protected $gym;

    public function __construct(GymInterface $gym)
    {
        $this->gym = $gym;
    }

    public function getIndex(Request $request) {

        $this->resp = $this->gym->getPaginatedList($request);

        return view('admin.gym.index')
        ->withGym($this->resp->data);
    }

    public function getCreate() {

        return view('admin.gym.create');
    }

    public function postStore(GymRequest $request) {

        $this->resp = $this->gym->postStore($request);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function putUpdate(GymRequest $request, $id) {

        $this->resp = $this->gym->postUpdate($request, $id);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEdit(Request $request, $id) {

        $this->resp = $this->gym->getShow($id);

        if (!$this->resp->status) {
            return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
        }

        return view('admin.gym.edit')
        ->withUser($this->resp->data);
    }

    public function getDelete($id) {

        $this->resp = $this->gym->delete($id);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

}
