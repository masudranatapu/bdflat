<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\postAdRequest;
use App\Http\Requests\postElectronicMobilRequest;
use App\Http\Requests\postJobRequest;
use App\Http\Requests\postPropertyRequest;
use App\Category;
use App\Brand;
use App\Product;
use App\ProductType;
use App\ProductModel;
use App\City;
use App\Area;
use App\Package;
use App\Division;
use Toastr;
use Auth;


class AdPostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $category;
    protected $brand;
    protected $prodModel;
    protected $city;
    protected $division;
    protected $area;
    protected $prod_model;
    protected $package;

    public function __construct(Category $category, Brand $brand, Product $prodModel, City $city, Division $division, Area $area, ProductModel $prod_model, Package $package)
    {
       $this->middleware('auth');
       $this->categoryModel     = $category;
       $this->brandModel        = $brand;
       $this->productModel      = $prodModel;
       $this->cityModel         = $city;
       $this->divisionModel     = $division;
       $this->areaModel         = $area;
       $this->prod_model        = $prod_model;
       $this->package           = $package;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getAdPost(Request $request, string $subcategory = null )
    {
        $data = array();
        $data['category']       = $this->categoryModel->getCategory(); 
        $data['subcategory']    = $this->categoryModel->getAllSubCategory();
        
        if ($request->category != null) {
            $data['subcat_info'] = $this->categoryModel->getSubCategoryInfo($subcategory);

        }
        
        if ($subcategory) {

            $data['brand_combo']            = $this->brandModel->getBrandBySubCat($request->category,'list');
            $data['model_combo']            = null;
            $data['city_combo']             = $this->cityModel->getCityCombo('list');
            $data['division_combo']         = $this->divisionModel->getDivisionCombo('list');
            $data['selected_area_combo']    = Area::where('city_pk_no',5)->pluck('name','pk_no');
            $data['product_type_combo']     = ProductType::where('scat_pk_no',$request->category)->pluck('name','pk_no');
            $data['remaining_post']         = $this->package->getRemainingPost();

            if(request()->get('type') == 'property'){
                return view('ad_post.ad_post_property', compact('data'));
            }elseif(request()->get('type') == 'jobs'){
                return view('ad_post.ad_post_job', compact('data'));
            }else{
                return view('ad_post.ad_post', compact('data'));
            }

            
        }


        return view('ad_post.ad_post_category_selection',compact('data'));
    }



    public function postAdGeneral(postAdRequest $request)
    {
        $check_mobile_number = $this->productModel->checkMobileNumber($request);
        
        if ($check_mobile_number === false) {
            $msg        = 'Your Mobile number is not valid';
            $msg_title  = 'Invalid Data';
            Toastr::success($msg, $msg_title, ["positionClass" => "toast-top-right"]);
            return redirect()->back()->withInput($request->input());

        }

        $this->resp     = $this->productModel->postAdGeneral($request);
        $msg            = $this->resp->msg;
        $msg_title      = $this->resp->msg_title;
        Toastr::success($msg, $msg_title, ["positionClass" => "toast-top-right"]);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
           
    }

    public function postAdJob(postJobRequest $request)
    {
        
        $check_mobile_number = $this->productModel->checkMobileNumber($request);
        
        if ($check_mobile_number === false) {
            $msg        = 'Your Mobile number is not valid';
            $msg_title  = 'Invalid Data';
            Toastr::error($msg, $msg_title, ["positionClass" => "toast-top-right"]);
            return redirect()->back()->withInput($request->input());

        }

        $this->resp     = $this->productModel->postAdJob($request);
        $msg            = $this->resp->msg;
        $msg_title      = $this->resp->msg_title;
        Toastr::success($msg, $msg_title, ["positionClass" => "toast-top-right"]);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
           
    }

    public function postAdProperty(postPropertyRequest $request)
    {
        $check_mobile_number = $this->productModel->checkMobileNumber($request);

        if ($check_mobile_number === false) {
            $msg        = 'Your Mobile number is not valid';
            $msg_title  = 'Invalid Data';
            Toastr::success($msg, $msg_title, ["positionClass" => "toast-top-right"]);
            return redirect()->back()->withInput($request->input());

        }

        $this->resp     = $this->productModel->postAdProperty($request);
        $msg            = $this->resp->msg;
        $msg_title      = $this->resp->msg_title;
        Toastr::success($msg, $msg_title, ["positionClass" => "toast-top-right"]);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
           
    }


    public function updatePostGeneral(postAdRequest $request,$id)
    {
        $check_mobile_number = $this->productModel->checkMobileNumber($request);

        if ($check_mobile_number === false) {
            $msg        = 'Your Mobile number is not valid';
            $msg_title  = 'Invalid Data';
            Toastr::success($msg, $msg_title, ["positionClass" => "toast-top-right"]);
            return redirect()->back()->withInput($request->input());

        }

        $this->resp     = $this->productModel->updatePostGeneral($request, $id);
        $msg            = $this->resp->msg;
        $msg_title      = $this->resp->msg_title;

        Toastr::success($msg, $msg_title, ["positionClass" => "toast-top-right"]);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
           
    }

    public function updatePostProperty(postPropertyRequest $request,$id)
    {
        $check_mobile_number = $this->productModel->checkMobileNumber($request);

        if ($check_mobile_number === false) {
            $msg        = 'Your Mobile number is not valid';
            $msg_title  = 'Invalid Data';
            Toastr::success($msg, $msg_title, ["positionClass" => "toast-top-right"]);
            return redirect()->back()->withInput($request->input());

        }

        $this->resp     = $this->productModel->updatePostProperty($request, $id);
        $msg            = $this->resp->msg;
        $msg_title      = $this->resp->msg_title;
        Toastr::success($msg, $msg_title, ["positionClass" => "toast-top-right"]);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
           
    }
    public function updatePostJob(postJobRequest $request,$id)
    {
        $check_mobile_number = $this->productModel->checkMobileNumber($request);

        if ($check_mobile_number === false) {
            $msg        = 'Your Mobile number is not valid';
            $msg_title  = 'Invalid Data';
            Toastr::success($msg, $msg_title, ["positionClass" => "toast-top-right"]);
            return redirect()->back()->withInput($request->input());

        }

        $this->resp     = $this->productModel->updatePostJob($request, $id);
        $msg            = $this->resp->msg;
        $msg_title      = $this->resp->msg_title;
        // dd($this->resp);
        Toastr::success($msg, $msg_title, ["positionClass" => "toast-top-right"]);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
           
    }

    public function getMyAds(Request $request)
    {
        $data = array();
        $data['my_ads'] = $this->productModel->getMyAds(Auth::user()->id);        
        return view('users.my_ads',compact('data'));
    }

     

    public function getMyAdDelete($id)
    {
        $this->resp     = $this->productModel->getMyAdDelete($id);
        $msg            = $this->resp->msg;
        $msg_title      = $this->resp->msg_title;
        Toastr::success($msg, $msg_title, ["positionClass" => "toast-top-right"]);
        
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEditAds($id, $subcat_slug =  null)
    {
        $data           = array(); 
        $this->resp     = $this->productModel->getEditAds($id); 
        $data['row']    = $this->resp->data;
        $data['category']       = $this->categoryModel->getCategory(); 
        $data['subcategory']    = $this->categoryModel->getAllSubCategory(); 
        if ($subcat_slug == null) {
            return view('ad_post.edit_post_category_selection',compact('data'));

        }
        // dd($this->resp->data->area_id);
        
        if($this->resp->status == true){

            $subcategory_id                 = $this->resp->data->f_scat_pk_no; 
            $category_id                    = $this->resp->data->f_cat_pk_no; 
            $brand_id                       = $this->resp->data->f_brand; 
            $data['subcat_info']            = $this->categoryModel->getSubCategoryInfo($subcat_slug); 
            $data['brand_combo']            = $this->brandModel->getBrandCombo($category_id,'list');
            $data['model_combo']            = $this->prod_model->getProdModel($brand_id,'list');
            $data['city_combo']             = $this->cityModel->getCityCombo('list');
            $data['division_combo']         = $this->divisionModel->getDivisionCombo('list');
            if($this->resp->data->city_division == 'city'){
                $city_divi_col = 'city_pk_no';
            }
            if($this->resp->data->city_division == 'division'){
                $city_divi_col = 'division_pk_no';
            }
            $data['selected_area_combo']    = Area::where($city_divi_col,$this->resp->data->city_division_pk_no)->pluck('name','pk_no');
            // dd($data);
            $data['product_type_combo']     = ProductType::where('scat_pk_no',request()->get('category'))->pluck('name','pk_no');


            if(request()->get('type') == 'property'){
                return view('ad_post.edit_post_property', compact('data'));
            }elseif(request()->get('type') == 'jobs'){
                return view('ad_post.edit_post_job', compact('data'));
            }else{
                return view('ad_post.edit_post', compact('data'));
            } 
        
        }else{
            $msg            = $this->resp->msg;
            $msg_title      = $this->resp->msg_title;
            Toastr::success($msg, $msg_title, ["positionClass" => "toast-top-right"]);
            return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);  
        }
       
    }




    public function getProductModel($brand_id)
    {
        $prod_model = $this->prod_model->getProdModel($brand_id);
        return response()->json($prod_model);
    }


    public function test()
    {
        return view('ad_post.old_ad_post');
    }
    


     
}
