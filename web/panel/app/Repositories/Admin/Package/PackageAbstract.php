<?php
namespace App\Repositories\Admin\Package;

use App\Models\Package;
use App\Traits\RepoResponse;
use DB;


class PackageAbstract implements PackageInterface
{
    use RepoResponse;

    protected $package;

    public function __construct(Package $package)
    {
        $this->package = $package;
    }

    public function getPaginatedList($request, int $per_page = 100)
    {
        $data = $this->package->where('is_active', 1)->orderBy('order_id','asc')->get();
        return $this->formatResponse(true, '', 'admin.package.list', $data);
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
            return $this->formatResponse(false, 'City not created successfully !', 'admin.package.list');
        }
        DB::commit();

        return $this->formatResponse(true, 'City has been created successfully !', 'admin.package.list');
    }

    public function findOrThrowException($id)
    {
        $data = $this->package->where('pk_no', '=', $id)->first();

        if (!empty($data)) {
            return $this->formatResponse(true, '', 'admin.city.edit', $data);
        }

        return $this->formatResponse(false, 'Did not found data !', 'admin.package.list', null);
    }


    public function postUpdate($request, $id)
    {

        DB::beginTransaction();

        try {

            $city                   = $this->package->find($id);
            $city->name             = $request->name;
            $city->country_pk_no    = $request->country;
            $city->update();

            

        } catch (\Exception $e) {
            DB::rollback();

            return $this->formatResponse(false, 'Unable to update city !', 'admin.package.list');
        }

        DB::commit();

        return $this->formatResponse(true, 'City has been updated successfully !', 'admin.package.list');
    }

    public function delete($id)
    {
        DB::begintransaction();
        try {
            $city = $this->package->find($id);
            $city->is_active = 0;

        } catch (\Exception $e) {
            DB::rollback();

            return $this->formatResponse(false, 'Unable to delete this action !', 'admin.package.list');
        }
        DB::commit();

        return $this->formatResponse(true, 'Successfully delete this action !', 'admin.package.list');
    }




}
