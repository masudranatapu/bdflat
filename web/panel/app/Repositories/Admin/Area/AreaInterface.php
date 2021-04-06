<?php

namespace App\Repositories\Admin\Area;

interface AreaInterface
{
    public function getPaginatedList($request, int $per_page = 10);
    public function postStore($request);
    public function postUpdate($request, int $id);
    public function findOrThrowException($id);
    public function delete($id);
}
