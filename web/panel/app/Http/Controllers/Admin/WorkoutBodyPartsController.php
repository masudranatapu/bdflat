<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\WorkoutBodyPartsRequest;
use App\Repositories\Admin\WorkoutBodyParts\WorkoutBodyPartsInterface;
use Illuminate\Http\Request;
use DB;

class WorkoutBodyPartsController extends BaseController
{
    protected $bodyParts;

    public function __construct(WorkoutBodyPartsInterface $bodyParts)
    {
        $this->bodyParts = $bodyParts;
    }

    public function getIndex(Request $request)
    {
        $this->resp = $this->bodyParts->getPaginatedList($request, 20);

        return view('admin.workout-body-part.index')
            ->withRows($this->resp->data);
    }

    public function getCreate() {

        return view('admin.workout-body-part.create');
    }

    public function postStore(WorkoutBodyPartsRequest $request)
    {
        $this->resp = $this->bodyParts->postStore($request);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEdit(Request $request, $id)
    {
        $this->resp = $this->bodyParts->getShow($id);

        if (!$this->resp->status) {
            return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
        }

        return view('admin.workout-body-part.edit')
            ->withBodyparts($this->resp->data);
    }

    public function putUpdate(WorkoutBodyPartsRequest $request, $id)
    {
        $this->resp = $this->bodyParts->postUpdate($request, $id);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getDelete($id)
    {
        $this->resp = $this->bodyParts->delete($id);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }
}
