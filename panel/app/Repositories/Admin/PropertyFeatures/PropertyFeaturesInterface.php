<?php


namespace App\Repositories\Admin\PropertyFeatures;


interface PropertyFeaturesInterface
{
    public function getFeatures($limit = 2000);

    public function getFeature(int $id);

    public function postStore($request);

    public function postUpdate($request, int $id);
}
