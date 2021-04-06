<?php

namespace App\Repositories\Admin\GymAdmin;


interface GymAdminInterface
{
    public function getPaginatedList($request);
    public function postStore($request);
    public function postUpdate($request, int $id);
    public function getShow(int $id);
    public function delete(int $id);
}
