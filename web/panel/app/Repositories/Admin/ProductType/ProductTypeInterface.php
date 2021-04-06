<?php

namespace App\Repositories\Admin\ProductType;

interface ProductTypeInterface
{
    public function getPaginatedList($request, int $per_page = 2000);
    public function postStore($request);
    public function postUpdate($request, int $id);
    public function findOrThrowException($id);
    public function delete($id);
}
