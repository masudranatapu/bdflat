<?php

namespace App\Repositories\Admin\Owner;

interface OwnerInterface
{
    public function getPaginatedList($request);

    public function getShow(int $id);

    public function postUpdate($request, int $id);
    /*
    public function getShow(int $id);
    public function postStore($request);
    public function postUpdate($request, int $id);
    public function delete($id);
    */
}
