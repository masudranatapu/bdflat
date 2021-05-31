<?php
namespace App\Repositories\Admin\WebInfo;
use DB;
use Auth;
use Image;
use App\Models\City;
use App\Models\State;
use App\Models\WebInfo;
use App\Models\Country;
use App\Models\PoCode;
use App\Traits\RepoResponse;


class WebInfoAbstract implements WebInfoInterface
{
    use RepoResponse;

    protected $webinfo;
    protected $state;
    protected $city;
    protected $country;

    public function __construct(WebInfo $webinfo, Country $country, State $state, City $city)
    {
        $this->webinfo     = $webinfo;
        $this->state       = $state;
        $this->city        = $city;
        $this->country     = $country;

    }

    public function getPaginatedList($request, int $per_page = 20)
    {
        $data = $this->address->orderBy('NAME', 'ASC')->get();
        return $this->formatResponse(true, '', 'admin.address_type.list', $data);
    }


    public function postStore($request)
    {
        $userId = Auth::user()->PK_NO;
        //dd($userId);
        DB::beginTransaction();
        try {
            $webinfo                            = WebInfo::where('PK_NO', 1)->first();
            if ($webinfo == null) {
                $webinfo                        = new WebInfo();
            }
            $webinfo->META_TITLE                = $request->meta_title;
            $webinfo->META_KEYWORDS             = $request->meta_keywords;
            $webinfo->META_DESC                 = $request->meta_description;
            if(!is_null($request->file('fav_icon')))
            {
                $webinfo->FAV_PATH       = $this->uploadImage($request->fav_icon);
            }
            if(!is_null($request->file('site_logo')))
            {
                $webinfo->LOGO_PATH       = $this->uploadImage($request->site_logo);
            }

            $webinfo->save();


        } catch (\Exception $e) {
            dd($e);
                     DB::rollback();
            return $this->formatResponse(false, $e, 'admin.general.info');
        }
        DB::commit();
        return $this->formatResponse(true, 'Web info has been updated successfully !', 'admin.general.info');
    }

    public function uploadImage($image)
    {
      if($image)
      {
          $filename = $image->getClientOriginalExtension();
          $destinationPath1 = '/media/images/banner';
          if (!file_exists($destinationPath1)) {
              mkdir($destinationPath1, 0755, true);
          }
        $img = Image::make($image->getRealPath());
        $file_name1 = 'prod_'. date('dmY'). '_' .uniqid().'.'.$filename;
        Image::make($img)->save($destinationPath1.'/'.$file_name1);
        $imageUrl1 = $destinationPath1 .'/'. $file_name1;
      }
      return $imageUrl1;
    }

    public function findOrThrowException($id)
    {
        $data = $this->address->where('PK_NO', '=', $id)->first();

        if (!empty($data)) {
            return $this->formatResponse(true, '', 'admin.address_type.edit', $data);
        }

        return $this->formatResponse(false, 'Did not found data !', 'admin.address_type.list', null);
    }


    public function postUpdate($request, $id)
    {

        DB::beginTransaction();
        try {
            $webinfo                            = Category::find($id);
            $webinfo->META_TITLE                = $request->meta_title;
            $webinfo->META_KEYWORDS             = $request->meta_keywords;
            $webinfo->META_DESC                 = $request->meta_description;
            if(!is_null($request->file('fav_icon')))
            {
                $webinfo->FAV_PATH       = $this->uploadImage($request->fav_icon);
            }
            if(!is_null($request->file('site_logo')))
            {
                $webinfo->LOGO_PATH          = $this->uploadImage($request->site_logo);
            }

            $webinfo->update();


        } catch (\Exception $e) {
            dd($e);
                     DB::rollback();
            return $this->formatResponse(false, $e, 'admin.general.info');
        }
        DB::commit();
        return $this->formatResponse(true, 'Web info has been updated successfully !', 'admin.general.info');
    }

    public function delete($id)
    {

        DB::begintransaction();
        try {
            $this->address->where('PK_NO', $id)->delete();


        } catch (\Exception $e) {
            DB::rollback();

            return $this->formatResponse(false, 'Unable to delete this address type !', 'admin.address_type.list');
        }

        DB::commit();
        return $this->formatResponse(true, 'Successfully delete this  address type !', 'admin.address_type.list');
    }

    public function getCityAddress($id=null)
    {
        $data['city_details'] = null;
        if ($id != null) {
            $data['city_details'] = City::where('PK_NO', $id)->first();
        }
        $data['countryCombo']   = $this->country->getCountryCombo();
        $data['stateCombo']     = $this->state->getStateCombo();

        return $this->formatResponse(true, 'Data Found !', 'admin.address_type.list', $data);
    }

    public function getPostageAddress($id=null)
    {
        $data['postage_details'] = null;
        $data['countryCombo']   = $this->country->getCountryCombo();
        $data['stateCombo']     = $this->state->getStateCombo();

        if ($id != null) {
            $data['postage_details'] = PoCode::select('SS_PO_CODE.*','c.F_STATE_NO')
                                            ->join('SS_CITY as c','SS_PO_CODE.F_CITY_NO','c.PK_NO')
                                            ->where('SS_PO_CODE.PK_NO', $id)
                                            ->first();
           $data['cityCombo']   = $this->city->where('F_STATE_NO',$data['postage_details']->F_STATE_NO)->pluck('CITY_NAME','PK_NO');
        }else{
            $data['cityCombo']   = $this->city->where('F_STATE_NO',1)->pluck('CITY_NAME','PK_NO');
        }
        return $this->formatResponse(true, 'Data Found !', 'admin.address_type.list', $data);
    }

    public function postCityAddress($request,$id)
    {
        DB::begintransaction();
        try {
            $state = State::select('STATE_NAME')->where('PK_NO',$request->state)->first();
            if ($id == 0) {
                $city               = new City();
                $message = 'City Created Successfully !';
            }else{
                $city = City::find($id);
                $message = 'City Updated Successfully !';
            }
            $city->CITY_NAME    = $request->city;
            $city->F_STATE_NO   = $request->state;
            $city->STATE_NAME   = $state->STATE_NAME;
            $city->F_COUNTRY_NO = $request->country;
            $city->save();
        } catch (\Exception $e) {
            DB::rollback();
            return $this->formatResponse(false, $e->getMessage(), 'admin.address_type.list');
        }
        DB::commit();
        return $this->formatResponse(true, $message, 'admin.address_type.list');
    }

    public function postPostageAddress($request,$id)
    {
        DB::begintransaction();
        try {
            $city = City::select('CITY_NAME')->where('PK_NO',$request->city)->first();
            if ($id == 0) {
                $post_code               = new PoCode();
                $message = 'Post Code Created Successfully !';
            }else{
                $post_code = PoCode::find($id);
                $message = 'Post Code Updated Successfully !';
            }
            $post_code->PO_CODE         = $request->postage;
            $post_code->F_CITY_NO       = $request->city;
            $post_code->CITY_NAME       = $city->CITY_NAME;
            $post_code->F_COUNTRY_NO    = $request->country;
            $post_code->save();
        } catch (\Exception $e) {
            DB::rollback();
            return $this->formatResponse(false, $e->getMessage(), 'admin.address_type.list');
        }
        DB::commit();
        return $this->formatResponse(true, $message, 'admin.address_type.list');
    }

    public function getCityList()
    {
        $data = City::select('SS_CITY.*','c.NAME')
                    ->leftjoin('SS_COUNTRY as c','c.PK_NO','SS_CITY.F_COUNTRY_NO')
                    ->get();
        return $this->formatResponse(true, 'Data Found', 'admin.address_type.list',$data);
    }

    public function getPostageList()
    {
        $data = PoCode::select('SS_PO_CODE.PK_NO','SS_PO_CODE.PO_CODE','SS_PO_CODE.CITY_NAME','c.NAME','city.STATE_NAME')
                    ->leftjoin('SS_COUNTRY as c','c.PK_NO','SS_PO_CODE.F_COUNTRY_NO')
                    ->leftjoin('SS_CITY as city','city.PK_NO','SS_PO_CODE.F_CITY_NO')
                    ->get();
        return $this->formatResponse(true, 'Data Found', 'admin.address_type.list',$data);
    }

    
}
