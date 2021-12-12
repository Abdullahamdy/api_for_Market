<?php
namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $data =$request->user()->Products()->get();
        return response()->json(['status'=>1,'data'=>$data]);
    }
    public function getProducts()
    {
        $products = Product::all();
        return $products;
    }

    public function isFavouirte(Request $request)
    {
        $rule = [

            'id'=>'required',
            'count_products'=>'required',
            'delivery_price'=>'required',

        ];
        $valida = Validator()->make($request->all(), $rule);
        if ($valida->fails()) {
            return response()->json(['status'=>0,'message'=>'faild Validation',$valida->errors()->first()]);
        }

        $product = Product::find($request->id);

        if (!$product) {
            return response()->json(['status'=>0]);
        }
        $toggle = $request->user()->Products()->toggle([
            $product->id => [
                'is_favourite' => 1,
                'count_products'=>$request->count_products,
                'total_price'=>$request->count_products*$product->price,
                'status'=>'binding',
                'delivery_price'=>$request->delivery_price
            ]
        ]);
        return response()->json(['status'=>1,'data'=>$toggle]);
    }
    public function SortPopularity(Request $request)
    {
        $product = product::find($request->id);
        $data= $product->clients()->where('product_id', $product->id)->count();
        return response()->json(['status'=>1,'data'=>$data]);
    }

    public function SortPriceDesc()
    {
        $data = Product::orderBy('price', 'DESC')->get();
        return response()->json(['status'=>1,'data'=>$data]);
    }
    public function SortPriceAsc()
    {
        $data = Product::orderBy('price', 'Asc')->get();
        return response()->json(['status'=>1,'data'=>$data]);
    }
    public function sortNormal()
    {
        $data = Product::orderBy('created_at', 'Asc')->get();
        return response()->json(['status'=>1,'data'=>$data]);
    }
    public function ReportProblem(Request $request)
    {
        $rules =
        [
           'message'=>'required',
           'image'=>'required'

        ];
        $validat = Validator()->make($request->all(), $rules);
        if ($validat->fails()) {
            return response()->json(['status'=>0,'message'=>$validat->errors()->first()]);
        }
        $contentUs = new ContactUs();
        $contentUs->message = $request->message;
        $contentUs->save();
        $contactUs_id = $contentUs->id;
        $user = Auth::user();
        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $file) {
                $name = $file->getClientOriginalName();
                $file->storeAs('contactUs/'.$user->id, $file->getClientOriginalName(), 'contactUs');

                $images= new Image();
                $images->filename=$name;
                $images->imageable_id= $contactUs_id;
                $images->imageable_type = 'App\Models\ContactUs';
                $images->save();
            }
            return response()->json(['status'=>1,'message'=>'تم ادخال الداتا بنجاح','data'=>[$contentUs,$images]]);
        }
    }
    public function RequestStatus(Request $request)
    {
        $rule = [
            'status'=>'required',
        ];
        $valid = Validator()->make($request->all(), $rule);
        if ($valid->fails()) {
            return response()->json(['status'=>0,'message'=>'failed',$valid->errors()->first()]);
        }

        $data =$request->user()->Products()->where('status', $request->status)->where('client_id', Auth::user()->id)->get();
        return response()->json(['status'=>1,'data'=>$data]);
    }

    public function MapsAddress()
    {
        $user = Auth::user();
        return response()->json(['status'=>1,'message'=>'success','data'=>['longitude'=>$user->address_longitude,'latitude'=>$user->address_latitude]]);
    }


    public function shoppingBasket(Request $request)
    {
        
        /// you must status is binding

       
        $rules = [
            'longitude' => 'required',
            'latitude' => 'required',
        ];
        $dataDone =$request->user()->Products()->where('status', 'binding')->get();
        if ($dataDone) {
            $arr = [];

            $validator = validator()->make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->Json(['status'=>0, 'message'=>$validator->errors()->first()]);
            }else{


/// this is for calc destance with kilometers


                $latitude       =       $request->latitude;
                $longitude      =       $request->longitude;
        
                $groups         =       DB::table("clients");
        
                $groups         =       $groups->select("*", DB::raw("6371 * acos(cos(radians(" . $latitude . "))
                                        * cos(radians(address_latitude)) * cos(radians(address_longitude) - radians(" . $longitude . "))
                                        + sin(radians(" .$latitude. ")) * sin(radians(address_latitude))) AS distance"));
                $groups         =       $groups->having('distance', '<', 20);
                $groups         =       $groups->orderBy('distance', 'asc');
                
        
                $groups         =       $groups->first();
               
                
                
            }
          
            //  return $data[0]->pivot;
            
            foreach ($dataDone as $data) 
            {
                
                $da =  $data->pivot->total_price;
                $arr[] = $da;
            }
            



            $delivry =floor($groups-> distance * 4) ;

            $price = array_sum($arr);
            $sumprice =  array_sum($arr)+$delivry;
            return response()->json(['status'=>1,'message'=>'المشتريات',['data'=>$dataDone,'price'=>$price,'delivery'=>$delivry,'sumprice'=>$sumprice]]);
        
    }

   
    
    }



}






















 // public function searchGroup(Request $request)
    //     {
    //         $rules = [
    //             'longitude' => 'required',
    //             'latitude' => 'required',
    //         ];

    //         $validator = validator()->make($request->all(), $rules);
    //         if ($validator->fails()) {
    //             return response()->Json(['status'=>0, 'message'=>$validator->errors()->first()]);
    //         }


    //     $latitude       =       $request->latitude;
    //     $longitude      =       $request->longitude;

    //     $groups         =       DB::table("clients");

    //     $groups         =       $groups->select("*", DB::raw("6371 * acos(cos(radians(" . $latitude . "))
    //                             * cos(radians(address_latitude)) * cos(radians(address_longitude) - radians(" . $longitude . "))
    //                             + sin(radians(" .$latitude. ")) * sin(radians(address_latitude))) AS distance"));
    //     $groups         =       $groups->having('distance', '<', 20);
    //     $groups         =       $groups->orderBy('distance', 'asc');

    //     $groups         =       $groups->first();


    //         return response()->Json(['status'=>1, 'message'=>'success', 'data'=>$groups]);

    //     }