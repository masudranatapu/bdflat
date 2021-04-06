<?php
namespace App\Repositories\Admin\WorkoutItem;

interface WorkoutItemInterface {
    public function postStore($request);
    public function getPaginatedList($request);
    public function delete(int $id);
    public function getShow(int $id);
    public function postUpdate($request, $id);
}
