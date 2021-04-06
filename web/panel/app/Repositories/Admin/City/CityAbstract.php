<?php
namespace App\Repositories\Admin\City;

use App\Models\City;
use App\Traits\RepoResponse;
use DB;


class CityAbstract implements CityInterface
{
    use RepoResponse;

    protected $city;

    public function __construct(City $city)
    {
        $this->city = $city;
    }

    public function getPaginatedList($request, int $per_page = 5)
    {
        $data = $this->city->where('is_active', 1)->paginate($per_page);
        return $this->formatResponse(true, '', 'admin.city.list', $data);
    }


    public function postStore($request)
    {
        DB::beginTransaction();

        try {
            $city                  = new City();
            $url_slug              = strtolower($request->name);
            $city->url_slug        = $this->urlSlug($request->name); 
            $city->name            = $request->name;
            $city->country_pk_no   = $request->country;
            $city->save();

        } catch (\Exception $e) {

            DB::rollback();
            return $this->formatResponse(false, 'City not created successfully !', 'admin.city.list');
        }
        DB::commit();

        return $this->formatResponse(true, 'City has been created successfully !', 'admin.city.list');
    }

    public function findOrThrowException($id)
    {
        $data = $this->city->where('pk_no', '=', $id)->first();

        if (!empty($data)) {
            return $this->formatResponse(true, '', 'admin.city.edit', $data);
        }

        return $this->formatResponse(false, 'Did not found data !', 'admin.city.list', null);
    }


    public function postUpdate($request, $id)
    {

        DB::beginTransaction();

        try {

            $city                   = $this->city->find($id);
            $city->name             = $request->name;
            $city->country_pk_no    = $request->country;
            $city->update();

            

        } catch (\Exception $e) {
            DB::rollback();

            return $this->formatResponse(false, 'Unable to update city !', 'admin.city.list');
        }

        DB::commit();

        return $this->formatResponse(true, 'City has been updated successfully !', 'admin.city.list');
    }

    public function delete($id)
    {
        DB::begintransaction();
        try {
            $city = $this->city->find($id);
            $city->is_active = 0;

        } catch (\Exception $e) {
            DB::rollback();

            return $this->formatResponse(false, 'Unable to delete this action !', 'admin.city.list');
        }
        DB::commit();

        return $this->formatResponse(true, 'Successfully delete this action !', 'admin.city.list');
    }




}
