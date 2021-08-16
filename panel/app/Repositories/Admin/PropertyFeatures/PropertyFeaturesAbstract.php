<?php


namespace App\Repositories\Admin\PropertyFeatures;


use App\Models\ListingFeatures;
use App\Traits\RepoResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PropertyFeaturesAbstract implements PropertyFeaturesInterface
{
    use RepoResponse;

    protected $status;
    protected $msg;

    public function getFeatures($limit = 2000): object
    {
        $features = ListingFeatures::orderBy('ORDER_ID', 'DESC')->paginate($limit);
        return $this->formatResponse(true, '', '', $features);
    }

    public function getFeature(int $id): object
    {
        $feature = ListingFeatures::find($id);
        return $this->formatResponse(true, '', '', $feature);
    }

    public function postStore($request)
    {
        $this->status = false;
        $this->msg = 'Feature not added!';

        DB::beginTransaction();
        try {
            $slug = Str::slug($request->title);
            $check = ListingFeatures::where('URL_SLUG', '=', $slug)->first();
            if ($check) {
                $slug .= '-' . (ListingFeatures::max('PK_NO') + 1);
            }

            $feature = new ListingFeatures();
            $feature->TITLE = $request->title;
            $feature->ORDER_ID = $request->order_id;
            $feature->IS_ACTIVE = $request->status;
            $feature->URL_SLUG = $slug;
            $feature->save();

            $this->status = true;
            $this->msg = 'Feature added successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($this->status, $this->msg, 'admin.property.features');
    }

    public function postUpdate($request, int $id): object
    {
        $this->status = false;
        $this->msg = 'Feature not updated!';

        DB::beginTransaction();
        try {
            $feature = ListingFeatures::find($id);
            $feature->TITLE = $request->title;
            $feature->ORDER_ID = $request->order_id;
            $feature->IS_ACTIVE = $request->status;
            $feature->save();

            $this->status = true;
            $this->msg = 'Feature updated successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($this->status, $this->msg, 'admin.property.features');
    }
}
