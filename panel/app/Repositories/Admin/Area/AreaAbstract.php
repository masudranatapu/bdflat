<?php


namespace App\Repositories\Admin\Area;


use App\Models\Area;
use App\Traits\RepoResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AreaAbstract implements AreaInterface
{
    use RepoResponse;

    protected $status;
    protected $msg;

    public function getAreas($limit = 2000): object
    {
        $areas = Area::all()->take($limit);
        return $this->formatResponse(true, '', 'admin.area.list', $areas);
    }

    public function getArea(int $id): object
    {
        $area = Area::find($id);
        return $this->formatResponse(true, '', 'admin.area.list', $area);
    }

    public function postStore($request): object
    {
        $this->status = false;
        $this->msg = 'Area could not be added!';

        DB::beginTransaction();
        try {
            $city = new Area();
            $city->AREA_NAME = $request->area_name;
            $city->URL_SLUG = Str::slug($request->area_name);
            $city->ORDER_ID = $request->order;
            $city->F_CITY_NO = $request->city;
            $city->LAT = $request->latitude;
            $city->LON = $request->longitude;
            $city->save();

            $this->status = true;
            $this->msg = 'Area added successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($this->status, $this->msg, 'admin.area.list');
    }

    public function postUpdate($request, int $id)
    {
        $this->status = false;
        $this->msg = 'Area could not be updated!';

        DB::beginTransaction();
        try {
            $city = Area::find($id);
            $city->AREA_NAME = $request->area_name;
            $city->URL_SLUG = Str::slug($request->area_name);
            $city->ORDER_ID = $request->order;
            $city->F_CITY_NO = $request->city;
            $city->LAT = $request->latitude;
            $city->LON = $request->longitude;
            $city->save();

            $this->status = true;
            $this->msg = 'Area added successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($this->status, $this->msg, 'admin.area.list');
    }
}
