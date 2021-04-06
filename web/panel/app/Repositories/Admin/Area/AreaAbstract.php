<?php
namespace App\Repositories\Admin\Area;

use App\Models\Area;
use App\Traits\RepoResponse;
use DB;


class AreaAbstract implements AreaInterface
{
    use RepoResponse;

    protected $area;

    public function __construct(Area $area)
    {
        $this->area = $area;
    }

    public function getPaginatedList($request, int $per_page = 10)
    {
      
        $query = $this->area->where(['is_delete' => 0])->orderBy('city_division', 'ASC')->orderBy('order_id', 'ASC');

        $query->when(request('type') != null, function ($q) {
            return $q->where('city_division', '=', request('type'));
        });

        $data = $query->paginate($per_page);

        return $this->formatResponse(true, '', 'admin.area.list', $data);
    }


    public function postStore($request)
    {

      
      if($request->city_id == null && $request->division_id == null){
          return $this->formatResponse(false, 'Unable to create area because you need to select city or division !', 'admin.city.list');
      }
       
        DB::beginTransaction();

        try {
            $area                        = new Area();
            $area->city_division         = $request->city_id ? 'city' : 'division';
            $area->city_pk_no            = $request->city_id;
            $area->division_pk_no        = $request->division_id;
            $area->name                  = $request->name;
            $area->url_slug              = $this->urlSlug($request->name);
            $area->order_id              = $request->order_id;
            $area->is_active             = $request->is_active ? 1 : 0;
            $area->save();

        } catch (\Exception $e) {

            DB::rollback();
            return $this->formatResponse(false, 'Area not created successfully !', 'admin.area.list');
        }
        DB::commit();

        return $this->formatResponse(true, 'Area has been created successfully !', 'admin.area.list');
    }

    public function findOrThrowException($id)
    {
        $data = $this->area->where('pk_no', '=', $id)->first();

        if (!empty($data)) {
            return $this->formatResponse(true, 'Data found', 'admin.area.edit', $data);
        }

        return $this->formatResponse(false, 'Did not found data !', 'admin.area.list', null);
    }


    public function postUpdate($request, $id)
    {
        DB::beginTransaction();

        try {

            $area                        = Area::find($id);
            $area->city_division         = $request->city_id ? 'city' : 'division';
            $area->city_pk_no            = $request->city_id;
            $area->division_pk_no        = $request->division_id;
            $area->name                  = $request->name;
            $area->url_slug              = $this->urlSlug($request->name);
            $area->order_id              = $request->order_id;
            $area->is_active             = $request->is_active ? 1 : 0;
            $area->update();

        } catch (\Exception $e) {
            DB::rollback();

            return $this->formatResponse(false, 'Unable to update area !', 'admin.area.list');
        }

        DB::commit();

        return $this->formatResponse(true, 'Area has been updated successfully !', 'admin.area.list');
    }

    public function delete($id)
    {
        DB::begintransaction();
        try {
            $area = $this->area->find($id);
            $area->is_delete = 1;
            $area->update();

        } catch (\Exception $e) {
            DB::rollback();

            return $this->formatResponse(false, 'Unable to delete this action !', 'admin.area.list');
        }

        DB::commit();

        return $this->formatResponse(true, 'Successfully delete this action !', 'admin.area.list');
    }




}
