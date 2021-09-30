<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\ReportRequest;
use App\Category;
use App\Product;
use App\Getproduct;
use App\Report;
use App\Shop;
use App\City;
use App\Division;
use App\ProductImg;
use App\Area;
use App\Chat;
use App\FavouriteProduct;
use Auth;
use Toastr;
use DB;
use App\Http\Controllers\CommonController as Common;


class AdsController extends Controller
{
    protected $common;
    protected $category;
    protected $product;
    protected $city;
    protected $division;
    protected $area;
    protected $getproduct;
    protected $report;
    
    
    public function __construct(Category $category, Product $product, Division $division, City $city,  Area $area, Common $common, Getproduct $getproduct, Report $report)
    {
       $this->category  = $category;
       $this->product   = $product;
       $this->division  = $division;
       $this->city      = $city;
       $this->area      = $area;
       $this->common    = $common;
       $this->report    = $report;
     
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getAdsList(Request $request, string $area_query = 'bangladesh', string $category_query = null )
    {

        $page_count             = 0 ;
        $current_page           = request()->get('page') ? request()->get('page')-1 : 0; 
        $paging                 = DB::table('ss_paging')->first(); 
        $data                   = array();
        $common                 = $this->common->getCommon();
        $data['divisions']      = $common['divisions']; 
        $data['cities']         = $common['cities']; 
        $data['areas']          = $common['areas']; 
        $data['category']       = $common['category']; 
        $data['subcategory']    = $common['subcategory'];
        // $data['breadcrumb']     = $this->common->getBreadcrumb();
        $data['category_query'] = $category_query;

        $query = Product::where('is_active',1)->select('prd_master.pk_no','prd_master.promotion','prd_master.price','prd_master.is_negotiable','prd_master.ad_title','prd_master.url_slug','prd_master.created_at','prd_master.city_division','prd_master.area_id','prd_master.f_cat_pk_no','prd_master.f_scat_pk_no','prd_master.is_active','prd_master.thumb','prd_master.total_view','prd_master.created_at','prd_master.using_condition','prd_master.area_id','prd_master.customer_pk_no');

        if($category_query){
            $category = Category::where('url_slug',$category_query)->first(); 
            if($category->parent_id == 0 ){
                $category_name      = $category->name;
                $query->where('cat_url_slug', $category_query);

            } else{
                $data['get_category_query']   = $category_query;
                $category_name                = $category->name;
                $data['category_query']       = $category->parentCategory->url_slug ?? '';
                $query->where('scat_url_slug', $category_query);
            }
            $data['category_query_display']   = ucfirst(str_replace("-"," ",$category_query));

        }

        
        $data['category_name']            = $category_name ?? null;
        $data['get_area_query']           = $area_query;
        $data['area_query_display']       = ucfirst(str_replace("-"," ",$area_query));
        
        if($area_query != 'bangladesh'){
            $area = $this->area->where('url_slug', $area_query)->first();


            if (!empty($area)) {
                $query->where('area_url_slug', $area_query);

            }else{
                $query->where('city_division_url_slug', $area_query);
            }
        }
         
        


        $data['area_query'] = $area_query == null ? 'bangladesh' : $area_query;
       
        $data['get_category_query']         = $category_query;




        if($request->keywords != ''){
            $keywords = $request->keywords;
            $query->where('search_key','like','%'.$keywords.'%');
        }

    
        if(($request->urgent == 1) && ($request->featured == 1) ) {
            $query->whereIn('promotion', ['Urgent','Feature']);
        }elseif(($request->urgent == 1) && ($request->featured == 0) ){
             $query->whereIn('promotion', ['Urgent']);
        }elseif(($request->urgent == 0) && ($request->featured == 1) ){
             $query->whereIn('promotion', ['Feature']);
        }

        if(($request->new == 1) && $request->used == 0){
            $query->where('using_condition', 'new');
        }
        if(($request->used == 1) && ($request->new == 0)){
            $query->where('using_condition', 'used');
        }

        if(($request->sort == 'date') && ($request->order == 'asc')){
            $query->orderBy('created_at', 'ASC');
        }

        if(($request->sort == 'price') && ($request->order == 'asc')){
            $query->orderBy('price', 'ASC');
        }
        if(($request->sort == 'price') && ($request->order == 'desc')){
            $query->orderBy('price', 'DESC');
        }






        
        $query_top      = clone $query;
        $query_urgent   = clone $query;
        $query_feature  = clone $query;
        $query_basic    = clone $query;
        $query_total    = clone $query;


     
        $top        = $query_top->where('promotion','Top')->inRandomOrder()->get()->all();
        $urgent     = $query_urgent->where('promotion','Urgent')->get()->all();
        $feature    = $query_feature->where('promotion','Feature')->get()->all();
        $basic      = $query_basic->where('promotion','Basic')->get()->all();


        $top_count      = count($top);      
        $urgent_count   = count($urgent);
        $feature_count  = count($feature);
        $basic_count    = count($basic);
        $total_pro      = $query_total->get()->count();
        // dd($urgent);

        $top_index      = 0;
        $urgent_index   = 0;
        $feature_index  = 0;
        $basic_index    = 0;

        $page_size      = $paging->total_record ?? 20;
        $page_count     = intval(ceil($total_pro/$page_size));

        $top_chunk      = $paging->Top ?? 2;
        $urgent_chunk   = $paging->Urgent ?? 5;
        $feature_chunk  = $paging->Feature ?? 5;
        

        $basic_chunk    = $page_size - ($top_chunk + $urgent_chunk + $feature_chunk);
        
        if ($basic_count == 0 ) {
           $feature_chunk = $feature_chunk + $basic_chunk; 

        }
        if($feature_count == 0){
            $urgent_chunk = $urgent_chunk + $feature_chunk;
        }

        if($urgent_count == 0){
            $top_chunk  = $top_chunk +  $urgent_chunk;
        }


// dd($urgent_chunk);
        $pro_page_list_arr = array();
        $pro_page_list_arr['page'][0] = array();



        for ($i=0; $i < $page_count; $i++) { 
            
            $page_index = 0;

            for ($j=0; $j < $page_size; $j++) { 

                if ( ($page_index < $top_chunk) && ($top_index < $top_count ) ) {

                    $pro_page_list_arr['page'][$i][$j] = $top[$top_index];
                    $top_index++;
                    $page_index++;

                    // dd($pro_page_list_arr);

                }elseif ( ($page_index < ($top_chunk+$urgent_chunk)) && ($urgent_index < $urgent_count ) ) {

                    $pro_page_list_arr['page'][$i][$j] = $urgent[$urgent_index];

                    $urgent_index++;
                    $page_index++;

                }elseif ( ($page_index < ($top_chunk+$urgent_chunk+$feature_chunk)) && ($feature_index < $feature_count ) ) {

                    $pro_page_list_arr['page'][$i][$j] = $feature[$feature_index];
                    $feature_index++;
                    $page_index++;

                }elseif ( ($page_index < ($top_chunk+$urgent_chunk+$feature_chunk+$basic_chunk)) && ($basic_index < $basic_count ) ) {



                    $pro_page_list_arr['page'][$i][$j] = $basic[$basic_index];
                    $basic_index++;
                    $page_index++;
                }               
              
            }
        }
        // dd($current_page);
    

        $result = $pro_page_list_arr['page'][$current_page] ?? array() ;


        
        if($result && count($result) > 0 ){
            foreach ($result as $key => $value) {
                if ($value->thumb) {

                    if(file_exists( public_path().'/uploads/product/'.$value->pk_no.'/thumb/'.$value->thumb )){

                        $value->img_path_thumb = asset('/uploads/product/'.$value->pk_no.'/thumb/'.$value->thumb);
                    }else{
                       $value->img_path_thumb = asset('/assets/img/default_thumb.png'); 
                    }
                    
                }else{
                    $value->img_path_thumb = asset('/assets/img/default_thumb.png');
                }
            }
        }
        $data['rows'] = $result;
        $data['page_count'] = $page_count;



        $data['current_page'] = $current_page+1;
        
        

        return view('ads.list', compact('data'));
    }

    public function getAdDetails(Request $request, int $pk_no, string $url_slug = null )
    {

        $data       = array();
        $all_text   = array();

        try {
            $row = Product::where(['pk_no' => $pk_no , 'is_active' => 1])->first();
            if(empty($row)){
                return view('error.404',compact('data'));
            }
            $row->is_favorite = 0;

            if(Auth::user()){
                $uid = Auth::user()->id;
                $check_fav  = FavouriteProduct::where([ 'f_customer_pk_no' => $uid, 'f_prd_pk_no' => $pk_no])->first();
                if (!empty($check_fav)) {
                    $row->is_favorite  = 1;
                }
            }

            Product::find($pk_no)->increment('total_view');
            $data['row']            = $row;
            $data['photos']         = ProductImg::where('f_prd_master_no',$pk_no)->orderBy('serial_no','asc')->get();
            $data['area_query_display'] = null;
            $data['area_query'] = null;
            $common                 = $this->common->getCommon();
            $data['divisions']      = $common['divisions']; 
            $data['cities']         = $common['cities']; 
            $data['areas']          = $common['areas']; 
            $data['category']       = $common['category']; 
            $data['subcategory']    = $common['subcategory'];
            $data['similar_ads']    = $this->product->similarAds($row);

            /*if (Auth::user()) {
                
                $meg_by     = Auth::user()->id;
                $post_by    = $row->customer_pk_no;
                $all_text   = Chat::where(function($q) use ($meg_by,$pk_no) {
                        $q->where('customer_pk_no', $meg_by)
                        ->where('prd_pk_no', $pk_no);
                    })
                    ->where('customer_pk_no', $meg_by)
                    ->orWhere(function($q) use ($meg_by,$pk_no) {
                        $q->where('created_at', $meg_by)
                        ->where('prd_pk_no', $pk_no);
                    })
                    ->orderBy('created_at','asc')->get();
            } */

            $data['all_text'] = array(); 

            // dd($meg_by);


            } catch (\Exception $e) {
               // dd($e);

                return view('error.404',compact('data'));
            }

        return view('ads.details',compact('data'));
    }


    public function postAdReport(ReportRequest $request, $id)
    {
        $request->prod_pk_no = $id;
        $this->resp = $this->report->postAdReport($request);

        $msg            = $this->resp->msg;
        $msg_title      = $this->resp->msg_title;
        Toastr::success($msg, $msg_title, ["positionClass" => "toast-top-right"]);
        return redirect()->back()->with($this->resp->redirect_class, $this->resp->msg);
       

    }


    public function getShopPage($id, $url = null)
    {

        $data = array();
        $shop = Shop::where('pk_no',$id)->first();
        
        if(empty($shop)){
            return redirect()->route('my-shop');
        }

        $data['shop_data'] = $shop;
        $data['my_ads'] = $this->product->getMyAds($shop->customer_pk_no);
       // dd($data['shop_data']);

        return view('shop.my_shop',compact('data'));
    }


     
}
