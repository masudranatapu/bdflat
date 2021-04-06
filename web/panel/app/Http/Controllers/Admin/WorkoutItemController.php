<?php

namespace App\Http\Controllers\Admin;


use App\Repositories\Admin\WorkoutBodyParts\WorkoutBodyPartsInterface;
use App\Repositories\Admin\WorkoutItem\WorkoutItemInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\WorkoutItemRequest;

class WorkoutItemController extends BaseController
{
    protected $workout;
    protected $bodyparts;

    public function __construct(WorkoutItemInterface $workout, WorkoutBodyPartsInterface $bodyparts)
    {
        $this->workout = $workout;
        $this->bodyparts = $bodyparts;
    }

    public function getIndex(Request $request) {

        $this->resp = $this->workout->getPaginatedList($request);

        return view('admin.workout-item.index')
        ->withWorkouts($this->resp->data);
    }

    public function getCreate() {

        return view('admin.workout-item.create')
        ->withBodyparts($this->bodyparts->getList());
    }

    public function postStore(WorkoutItemRequest $request) {

        $this->resp = $this->workout->postStore($request);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function putUpdate(WorkoutItemRequest $request, $id) {

        $this->resp = $this->workout->postUpdate($request, $id);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEdit(Request $request, $id) {

        $this->resp = $this->workout->getShow($id);

        if (!$this->resp->status) {
            return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
        }

        return view('admin.workout-item.edit')
        ->withItem($this->resp->data)
        ->withBodyparts($this->bodyparts->getList());
    }

    public function getDelete($id) {

        $this->resp = $this->workout->delete($id);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

}
