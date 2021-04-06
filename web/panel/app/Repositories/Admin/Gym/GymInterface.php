<?php
namespace App\Repositories\Admin\Gym;

interface GymInterface {
    public function postStore($request);
    public function getPaginatedList($request);
    public function getList();
    public function delete(int $id);
    public function getShow(int $id);
    public function postUpdate($request, $id);
}
