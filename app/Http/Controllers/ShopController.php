<?php
namespace App\Http\Controllers;
use App\Http\Requests\storeShopRequest;
use Illuminate\Http\Request;
use App\Shop;
use App\Product;
use Toastr;
use Auth;

class ShopController extends Controller
{
    protected $shopModel;
    protected $prodModel;

    public function __construct(Shop $shop,Product $prodModel)
    {
        $this->middleware('auth');
        $this->shopModel  = $shop;
        $this->prodModel  = $prodModel;
         
    }
    
    public function getMyShop(Request $request)
    {
       
        $data       = array();
        $shop_data  = $this->shopModel->getMyShop(Auth::user()->id); 
        $data['shop_data'] = $shop_data;    

        // $data['my_ads'] = $this->prodModel->getMyAds();
        // dd($data);
        return view('shop.index',compact('data'));
        // return view('shop.my_shop',compact('data'));
    }




 

    //create shop
    public function getCreateShop(Request $request)
    {
        return view('shop.create_shop');
    }

    //store shop data
    public function getStoreShop(storeShopRequest $request)
    {
        if($request->file('banner')){
            $extn = array('jpeg','jpg','png','gif','webp','bmp','jfif');
            $oriExtn = strtolower($request->file('banner')->getClientOriginalExtension());
            
            if(!in_array($oriExtn, array_map('strtolower', $extn))){
             Toastr::error('Your file extension is not suported !', 'Error !', ["positionClass" => "toast-top-right"]);
             return redirect()->back()->withInput();
            }

        }

        $this->resp     = $this->shopModel->storeMyShop($request);
        $msg            = $this->resp->msg;
        $msg_title      = $this->resp->msg_title;
        
        Toastr::info($msg, $msg_title, ["positionClass" => "toast-top-right"]);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }


    //modify shop
    public function getModifyShop(Request $request)
    {
        $data['shop_data']  = $this->shopModel->getMyShop(Auth::user()->id); 
        return view('shop.modify_shop', compact('data'));
    }



    //update shop
    public function getUpdateShop(storeShopRequest $request)
    {
        if($request->file('banner')){
            $extn = array('jpeg','jpg','png','gif','webp','bmp','jfif');
            $oriExtn = strtolower($request->file('banner')->getClientOriginalExtension());
            
            if(!in_array($oriExtn, array_map('strtolower', $extn))){
             Toastr::error('Your file extension is not suported !', 'Error !', ["positionClass" => "toast-top-right"]);
             return redirect()->back()->withInput();
            }

        }

        $this->resp     = $this->shopModel->updateMyShop($request);
        $msg            = $this->resp->msg;
        $msg_title      = $this->resp->msg_title;
        
        Toastr::info($msg, $msg_title, ["positionClass" => "toast-top-right"]);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    
}
