<?php

namespace App\Repositories\Admin\Product;


interface ProductInterface
{
    public function getPaginatedList($request);
    public function postStore($request);
    public function postStoreProductVariant($request);
    public function postUpdate($request, int $id);
    // public function postUrlSlugUpdate($request);
    public function postUpdateProductVariant($request, int $id);
    public function getShow(int $id);
    public function delete(int $id);
    public function deleteImage(int $id);
    
    public function getSearchList($request);
}
