<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
use App\Product;
use DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Singlecheck;
use App\Sale;
use Carbon;
use Yajra\DataTables\Facades\DataTables;
Use Alert;

use App\Billmonitor;

class WaltersController extends Controller
{


//     alert()->success('SuccessAlert','Lorem ipsum dolor sit amet.');
// alert()->info('InfoAlert','Lorem ipsum dolor sit amet.');
// alert()->warning('WarningAlert','Lorem ipsum dolor sit amet.');
// alert()->error('ErrorAlert','Lorem ipsum dolor sit amet.');
// alert()->question('QuestionAlert','Lorem ipsum dolor sit amet.');
// toast('Success Toast','success');


    public function home(){
    	return view('layouts.dashboard');
    }


    public function add_branch(){
    	$branch = Branch::latest()->get();
    	//dd($branch)
    	return view('branch.add_branch',['branches'=>$branch]);
    }


    public function view_branch(){
        $branch = Branch::latest()->get();
        return view('branch.view_branch',['branches'=>$branch]);
    }


    public function save_branch(Request $request){
    	$this->validate($request,[
    		'branch-location'=> 'required|max:255',
    		'contact-number'=> 'required|max:10',
    	]);


       $maxcode = DB::table('branches')->where('branchode', 'like', '%WAL%')->max('branchode');
       if ($maxcode) {
         $max = substr($maxcode, 3);
         $number = $max + 1;
         $code = "WAL".$number;
     }else{
         $code = "WAL100";
     }


     $data =  [
      'branchode' => $code,
      'branchloc'  => $request->input('branch-location'),
      'contact'  => $request->input('contact-number')
  ];


  $branch = new Branch($data);
  $branch->save();

  toast('New Branch Recorded Successfully','success');
  return Redirect()->back();
}



public function edit_branch($id){
   $branch = Branch::where('id',$id)->first();

   return view('branch.edit_branch',['branch'=>$branch]);
}


public function update_branch(Request $request, $id){
   $this->validate($request,[
      'branch-location'=> 'required|max:255',
      'contact-number'=> 'required|max:10',
  ]);

   $branch = Branch::where('id',$id)->first();
   $branch->branchloc = $request->input('branch-location');
   $branch->contact = $request->input('contact-number');
   $branch->save();


   alert()->success('Successfully','Info Updated Successfully!');

   return Redirect()->route('add-branch');


}



public function delete_branch($id){
   $branch = Branch::where('id',$id)->first();
   $branch->delete();

   alert()->success('Successfully','Info Delected Successfully!');
   return Redirect()->back();

}
	//End of Branch Adding



public function add_product(){
   $branch = Branch::all();
   $product = Product::latest()->get();
   return view('Product.new_product',['branches'=> $branch,'products'=>$product]);
}


public function save_product(Request $request){

    	//dd($request);

   $this->validate($request,[
      'product-name'=> 'required|max:255',
      'product-type'=> 'required',
      'product-price'=> 'required',
      'prodcut-qty'=> 'required',
      'shortage'=> 'required',
      'branch'=> 'required'
  ]);


   if ($request->has('product-pieces')) {
      $data = [
          'user_id' => auth()->user()->id,
          'branchcode'  => $request->input('branch') ,
          'productname'  => $request->input('product-name'),
          'productType'  => $request->input('product-type'),
          'pieces' => $request->input('product-pieces'),
          'productprice'  => $request->input('product-price') ,
          'quantuty'  => $request->input('prodcut-qty') ,
          'alert'  => $request->input('shortage')];
      }else{
          $data = [
              'user_id' => auth()->user()->id,
              'branchcode'  => $request->input('branch') ,
              'productname'  => $request->input('product-name'),
              'productType'  => $request->input('product-type'),
              'productprice'  => $request->input('product-price') ,
              'quantuty'  => $request->input('prodcut-qty') ,
              'alert'  => $request->input('shortage')];
          }



          $product = new Product($data);
          $product->save();


    	// return Redirect()->back()->with('message','New Product Recorded Successfully!');

          echo'
          <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-warning"></i> Success!</h4>
          New Product Recorded Successfully!
          </div>
          ';
      }

      public function getproducts(){
        $products = Product::latest()->get();
        $branch = Branch::all();


        return Datatables::of($products)
        ->addColumn('action', function ($prodct) {
            if (auth()->user()->hasRole('worker')) {
                return "

                <a href='/Walters/DreamBig/edit-product/".$prodct->id."' class='btn btn-info' ><i class='fa fa-pencil-square-o'></i>Edit</a>               

                ";
            }else{
                return "

                <a href='/Walters/DreamBig/edit-product/".$prodct->id."' class='btn btn-info' ><i class='fa fa-pencil-square-o'></i>Edit</a>               

                <a href='#' class='btn btn-danger' cid='".$prodct->id."' id='deleteprdct' ><i class='fa fa-trash'></i>Delete</a>

                ";
            }
            

            
        })
        ->addIndexColumn()
        ->make(true);
        //return view('table.products',['branches'=> $branch,'products'=>$product]);

    }





    public function edit_product($id){
    	$product = Product::where('id',$id)->first();
    	$branch = Branch::all();
    	return view('Product.edit_product',['branches'=> $branch,'product'=>$product]);
    }


    public function update_product(Request $request, $id){

    	$this->validate($request,[
    		'product-name'=> 'required|max:255',
    		'product-type'=> 'required',
    		'product-price'=> 'required',
    		'prodcut-qty'=> 'required',
    		'shortage'=> 'required',
    		'branch'=> 'required'
    	]);


    	$product = Product::where('id',$id)->first();
    	$product->branchcode = $request->input('branch');
    	$product->productname = $request->input('product-name');
    	$product->productType = $request->input('product-type');

    	if ($request->has('product-pieces')) {
    		$product->pieces = $request->input('product-pieces');
    	}
    	$product->productprice = $request->input('product-price');
    	$product->quantuty = $request->input('prodcut-qty');
    	$product->alert = $request->input('shortage');
    	$product->save();


    	return Redirect()->route('add-product')->with('message','Product Updated Successfully!');

    }


    public function delete_product($id, Request $request){
        $ajx = $request->post('ajaxs');


        //dd($ajx);

        $product = Product::where('id',$id)->first();
        $product->delete();

        

        if ($ajx) {

            echo'
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-warning"></i> Success!</h4>
            Product Delected Successfully!
            </div>
            ';


            exit();
        }

        return Redirect()->route('add-product')->with('message','Product Delected Successfully!');
    }



    public function delete_product2($id, Request $request){
       $ajx = $request->post('ajaxs');


        //dd($ajx);

       $product = Product::where('id',$id)->first();
       $product->delete();

       

       if ($ajx) {

        echo'
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-warning"></i> Success!</h4>
        Product Delected Successfully!
        </div>
        ';


        exit();
    }

    return Redirect()->route('view-product')->with('message','Product Delected Successfully!');
}




public function view_product(){
   $branch = Branch::all();
   $product = Product::latest()->get();
   $scheck = Singlecheck::all();
   return view('Product.inventory',['checks' => $scheck, 'branches'=> $branch,'products'=>$product]);
}




public function sales_per_day($code){
    	//echo $code;
    	//exit();
   $user = User::all();
   $branch = Branch::all();
   $cchck = User::where('id',auth()->user()->id)->first();  
   $cc = $cchck->hasRole('worker');
   if ($cc) {
    $sales = Sale::where('brancode',$code)
    ->whereDate('created_at', \Carbon\Carbon::today())
    ->where('user_id',auth()->user()->id)->orderBy('id','Desc')->get();

    return view('Sales.salespday',['branches'=>$branch,'sales'=> $sales,'users'=>$user]);
}else{
    $sales = Sale::where('brancode',$code)
    ->whereDate('created_at', \Carbon\Carbon::today())
    ->orderBy('id','Desc')->get();

    return view('Sales.salespday',['branches'=>$branch,'sales'=> $sales,'users'=>$user]);
}



}



public function sales_per_month($code){

   $user = User::all();
   $branch = Branch::all();
   $cchck = User::where('id',auth()->user()->id)->first();  
   $cc = $cchck->hasRole('worker');
   if ($cc) {
    $sales = Sale::where('brancode',$code)
    ->where('user_id',auth()->user()->id)->orderBy('id','Desc')->get();
        //dd($sales);
    return view('Sales.salespmonth',['code'=>$code,'branches'=>$branch,'sales'=> $sales,'users'=>$user]);
}else{
    $sales = Sale::where('brancode',$code)->orderBy('id','Desc')->get();
        //dd($sales);
    return view('Sales.salespmonth',['code'=>$code,'branches'=>$branch,'sales'=> $sales,'users'=>$user]);
}

}



public function sales_per_product($code){
   $user = User::all();
   $branch = Branch::all();
   $product = Product::where('branchcode',$code)->get();
   $cchck = User::where('id',auth()->user()->id)->first();  
   $cc = $cchck->hasRole('worker');
   if ($cc) {
    $sales = Sale::where('brancode',$code)
    ->where('user_id',auth()->user()->id)->orderBy('id','Desc')->get();
        //dd($sales);
    return view('Sales.sales_per_product',['code'=>$code,'products'=>$product,'branches'=>$branch,'sales'=> $sales,'users'=>$user]);
}else{
    $sales = Sale::where('brancode',$code)->orderBy('id','Desc')->get();
        //dd($sales);
    return view('Sales.sales_per_product',['code'=>$code,'products'=>$product,'branches'=>$branch,'sales'=> $sales,'users'=>$user]);
}

}


public function sales_per_month_data(Request $request,$code){
   $startdate = $request->post('sdate');
   $enddate = $request->post('edate');
   $user = User::all();
   $branch = Branch::all();

   $cchck = User::where('id',auth()->user()->id)->first();  
   $cc = $cchck->hasRole('worker');
   if ($cc) {
    $sales = Sale::whereBetween('created_at',[$startdate,$enddate] )
    ->where('brancode',$code)
    ->where('user_id',auth()->user()->id)->orderBy('id','Desc')->get();


    return view('table.print',['sales'=>$sales,'branches'=>$branch,'users'=>$user]);
}
$sales = Sale::whereBetween('created_at',[$startdate,$enddate] )
->where('brancode',$code)->orderBy('id','Desc')->get();


return view('table.print',['sales'=>$sales,'branches'=>$branch,'users'=>$user]);
    	//dd($sales);
}



public function sales_per_month_datatable($code,$from,$to){
    
 
    $cchck = User::where('id',auth()->user()->id)->first();  
    $cc = $cchck->hasRole('worker');
    if ($cc) {
        $sales = Sale::whereBetween('created_at',[$from,$to] )
        ->where('brancode',$code)
        ->where('user_id',auth()->user()->id)->orderBy('id','Desc')->get();
    }else{
        $sales = Sale::whereBetween('created_at',[$from,$to] )
        ->where('brancode',$code)->orderBy('id','Desc')->get();
    }

    

    return Datatables::of($sales)
    ->addColumn('add_user', function ($userinfo) {

      $users = User::all();

      foreach ($users as $user) {
        if ($user->id == $userinfo->user_id) {
            return $user->fullname;
        }else{
            return 'User Dont Exist';
        }     
        
    }

    
    
})
    ->addColumn('add_branch', function ($branch) {

     $branches = Branch::all();

     foreach ($branches as $branchs) {
        if ($branchs->branchode == $branch->brancode) {
            return $branchs->branchloc;
        }else{
            return 'Branch Dont Exist';
        }     
        
    }

    
    
})
    ->addColumn('date', function ($date) {
     return $date->created_at;
     
 })
    ->addIndexColumn()
    ->editColumn('created_at', function ($time) {
        return \Carbon\Carbon::parse($time->created_at)->diffForHumans();
    })
    ->make(true);

}





public function sales_perdate($code,$date){
    
    $cchck = User::where('id',auth()->user()->id)->first();  
    $cc = $cchck->hasRole('worker');
    if ($cc) {
        $sales = Sale::whereDate('created_at',$date)
        ->where('brancode',$code)
        ->where('user_id',auth()->user()->id)->orderBy('id','Desc')->get();
    }else{
        $sales = Sale::whereDate('created_at',$date)
        ->where('brancode',$code)->orderBy('id','Desc')->get();
    }

    

    return Datatables::of($sales)
    ->addColumn('add_user', function ($userinfo) {

      $users = User::all();

      foreach ($users as $user) {
        if ($user->id == $userinfo->user_id) {
            return $user->fullname;
        }else{
            return 'User Dont Exist';
        }     
        
    }

    
    
})
    ->addColumn('add_branch', function ($branch) {

     $branches = Branch::all();

     foreach ($branches as $branchs) {
        if ($branchs->branchode == $branch->brancode) {
            return $branchs->branchloc;
        }else{
            return 'Branch Dont Exist';
        }     
        
    }

    
    
})
    ->addColumn('date', function ($date) {
     return $date->created_at;
     
 })
    ->addIndexColumn()
    ->editColumn('created_at', function ($time) {
        return \Carbon\Carbon::parse($time->created_at)->diffForHumans();
    })
    ->make(true);

}







public function sales_p_p_data(Request $request,$code,$value){
    	//$prid = $request->post('value');

    $cchck = User::where('id',auth()->user()->id)->first();  
    $cc = $cchck->hasRole('worker');

    if ($cc) {
        $sales = Sale::where('product_id',$value)
        ->where('brancode',$code)
        ->where('user_id',auth()->user()->id)->orderBy('id','Desc')->get();
    }else{
        $sales = Sale::where('product_id',$value)
        ->where('brancode',$code)->orderBy('id','Desc')->get();
    }

    
    return Datatables::of($sales)
    ->addColumn('add_user', function ($userinfo) {

      $users = User::all();

      foreach ($users as $user) {
        if ($user->id == $userinfo->user_id) {
            return $user->fullname;
        }else{
            return 'User Dont Exist';
        }     
        
    }

    
    
})
    ->addColumn('add_branch', function ($branch) {

     $branches = Branch::all();

     foreach ($branches as $branchs) {
        if ($branchs->branchode == $branch->brancode) {
            return $branchs->branchloc;
        }else{
            return 'Branch Dont Exist';
        }     
        
    }                
})
    ->addColumn('date', function ($date) {
     return $date->created_at;
     
 })
    ->addIndexColumn()
    ->editColumn('created_at', function ($time) {
        return \Carbon\Carbon::parse($time->created_at)->diffForHumans();
    })
    ->make(true);


    	//dd($sales);
    	// return view('table.print',['sales'=>$sales,'branches'=>$branch,'users'=>$user]);
}

















public function all_sales($code){
   $user = User::all();
   $branch = Branch::all();

   $cchck = User::where('id',auth()->user()->id)->first();  
   $cc = $cchck->hasRole('worker');

   if ($cc) {
    $sales = Sale::where('brancode',$code)
    ->where('user_id',auth()->user()->id)->orderBy('id','Desc')->get();
        //dd($sales);
    return view('Sales.all_sales',['code'=>$code,'branches'=>$branch,'sales'=> $sales,'users'=>$user]);
}else{
    $sales = Sale::where('brancode',$code)->orderBy('id','Desc')->get();
        //dd($sales);
    return view('Sales.all_sales',['code'=>$code,'branches'=>$branch,'sales'=> $sales,'users'=>$user]);
}

}






//for the users
public function userrecord_sales(){
   $code = auth()->user()->branncode;

   $product = Product::where('branchcode',$code)->get();
   $user = User::all();
   $branch = Branch::all();

   $bill_id = DB::table('billmonitors')->where('brancode',$code)->max('bill_id');

   $sales = Sale::whereDate('created_at', \Carbon\Carbon::today())
   ->where('bill_id',$bill_id)
   ->where('user_id',auth()->user()->id)->get();

        //dd($sales);
   return view('Sales.crecord_sales',['branches'=>$branch,'products'=>$product,'sales'=> $sales,'users'=>$user]);



}



public function userrecord_sales_view(){
   $branch = Branch::all();
   $sales = Sale::whereDate('created_at', \Carbon\Carbon::today())->
   where('brancode',auth()->user()->branncode)
   ->where('user_id',auth()->user()->id)->get();
    	//dd($sales);
   return view('Sales.cusview',['branches'=>$branch,'sales'=> $sales]);
}






public function record_sales($code){
    	// $cchck = User::where('id',auth()->user()->id)->first();
    	// $cc = $cchck->hasRole('worker');
    	// if ($cc) {
    	// 	return Redirect()->route('record-usersales');
    	// }

   $product = Product::where('branchcode',$code)->get();
   $user = User::all();
   $branch = Branch::all();

   $bill_id = DB::table('billmonitors')->where('brancode',$code)->max('bill_id');

   $sales = Sale::whereDate('created_at', \Carbon\Carbon::today())
   ->where('bill_id',$bill_id)->get();

    	//dd($sales);
   return view('Sales.record_sales',['branches'=>$branch,'products'=>$product,'sales'=> $sales,'users'=>$user]);
}


public function fetchallsales($code){
    $product = Product::where('branchcode',$code)->get();
    $user = User::all();
    $branch = Branch::all();

    $bill_id = DB::table('billmonitors')->where('brancode',$code)->max('bill_id');

    $sales = Sale::whereDate('created_at', \Carbon\Carbon::today())
    ->where('user_id',auth()->user()->id)
    ->where('bill_id',$bill_id)
    ->orderBy('id','Desc')->get();

       // dd($sales);


    return view('table.print2',['sales'=>$sales,'branches'=>$branch,'users'=>$user]);
}






public function print_invoice(Request $request, $code){

    $cus = $request->input('customer');
    $phone = $request->input('phone');

    $bill_id = DB::table('billmonitors')->max('bill_id');

    $sales = Sale::whereDate('created_at', \Carbon\Carbon::today())
    ->where('user_id',auth()->user()->id)
    ->where('bill_id',$bill_id)->get();


    $invid = "WLT".$bill_id;
       // dd($sales);
    
    $num = rand(0,10).rand(0,10).rand(0,10);

    $iname = "Invoice".$num;

    $invoice = \ConsoleTVs\Invoices\Classes\Invoice::make();

    foreach ($sales as $row) {
      $invoice->addItem($row->productname, $row->price, $row->oprice, $row->quantity, 923);
  }

  $invoice->number($invid)
  ->with_pagination(true)
  ->duplicate_header(true)
  ->due_date(\Carbon\Carbon::now())
  ->notes('Thank you for shopping with us.')
  ->customer([
    'name'      => $cus,
    'phone'     => $phone,
    'location'  => 'Teshie',
    'zip'       => '00233',
    'city'      => 'Accra',
    'country'   => 'Ghana',
])
  ->show();
}



public function new_record(Request $request, $code){
    $maxcode = DB::table('billmonitors')->where('brancode',$code)->max('bill_id');

    $add = $maxcode + 1;

    $data = ['brancode'=>$code, 'bill_id'=> $add];

    $request->session()->put('bill_id',$add); 

    $mon = new Billmonitor($data);
    $mon->save();

    return Redirect()->back();
}


public function sales_save(Request $request){


        //dd($request);

   $this->validate($request,[
      'product-name' => 'required',
      'product-price' => 'required',
      'prodcut-qty' => 'required'
  ]);

   $prdctid = $request->post('product-name');
   $prdctpx = $request->post('product-price');
   $prdctqty = $request->post('prodcut-qty');

    	//dd($request);


    	//product
   $product = Product::where('id',$prdctid)->first();
   $branchcode = $product->branchcode;
   $producname = $product->productname;
   $prodtype = $product->productType;
   $prodqty = $product->quantuty;

   $bill_id = DB::table('billmonitors')->where('brancode',$branchcode)->max('bill_id');

   if ($prodtype == 'Bundle Product'){

      if ($request->has('product-type')) {
        $check = Singlecheck::where('product_id',$prdctid)->first();
        $type = $request->input('product-type');

        if ($type == 'Single Product') {

            $sold = 'Sold out of a Bundle';

            if ($check) {
    					//getquantity
               $checkqu = $check->qytleft;
    					//substract the left from it
               $checkleft = $checkqu - $prdctqty;
               $check->qytleft = $checkleft;
               $check->save();


               if ($checkleft < 0) {
    						//subsutrac 1 from the original product
                  $sunstract = $prodqty - 1;
                  $product->quantuty = $sunstract;
                  $product->save();

    						//checkleft 
                  $piecs = $product->pieces;


                  $chl = $checkleft + $piecs;

                  $check->qytleft = $chl;
                  $check->save();

                  $nas = $sunstract;

              }else{

                  $nas = $prodqty;
              }
    					//check left



              
              
          }else{

    					//substract bundle quantity
           $subqun = $prodqty - 1;
           $product->quantuty = $subqun;
           $product->save();

    					//the number form products - the quantity
           $checkqu = $product->pieces;
           $checkleft = $checkqu - $prdctqty;

           $cdata = ['product_id'=> $prdctid, 'qytleft' => $checkleft];	
           $ncheck = new Singlecheck($cdata);
           $ncheck->save();

           $nas = $subqun;
       }

   }else{
       $sold = 'Sold a Bundle';

       $subqun = $prodqty - $prdctqty;
       $product->quantuty = $subqun;
       $product->save();

       if ($check) {
          $checkleft = $check->qytleft;
      }else{
    						//selling a bundle then

    						//use default pieces
          $checkleft = $product->pieces;
          
      }

      $nas = $subqun;

      
  }
    			//get product type number shortcut

}



if ($checkleft < 0) {
 $orle = $chl;
}else{
 $orle = $checkleft;
}
    		//bundle products
$data = [

  'user_id' => auth()->user()->id,
  'product_id' => $prdctid,
  'brancode' => $branchcode,
  'productname' => $producname,
  'type' => $prodtype,
  'nbs' => $prodqty,
  'quantity' => $prdctqty,
  'price' => $prdctpx,
  'oprice' => $product->productprice,
  'nas' => $nas,
  'sold' => $sold,
  'bill_id' => $bill_id,
  'sinlgleleft' => $orle,


];

$sales = new Sale($data);
$sales->save();

}else{

    		//single products
  $subqun = $prodqty - $prdctqty;
  $product->quantuty = $subqun;
  $product->save();



  $data = [

      'user_id' => auth()->user()->id,
      'product_id' => $prdctid,
      'brancode' => $branchcode,
      'productname' => $producname,
      'type' => $prodtype,
      'nbs' => $prodqty,
      'quantity' => $prdctqty,
      'price' => $prdctpx,
      'oprice' => $product->productprice,
      'nas' => $subqun,
      'sold' => 'Sold A Single Product',
      'bill_id' => $bill_id,
      'sinlgleleft' => '',
  ];

  $sales = new Sale($data);
  $sales->save();

}



        //alert()->success('Successfully','les Recorded Successfully!');

echo'
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h4><i class="icon fa fa-warning"></i> Success!</h4>
Sales Recorded Successfully!
</div>
';

    	 // return Redirect()->back()->with('message','Sales Added Successfully!');


}



public function search_product(Request $request){
   $code = $request->post('value');
   $product = Product::where('id',$code)->first();
   $type = $product->productType;

   if ($type == 'Bundle Product') {
      echo"bundel";
  }else{
      echo"single";
  }
}



public function add_user($user){
   $branch = Branch::all();
   return view('UserRoles.add_user',['branches'=> $branch,'user'=>$user]);
}


public function reg_user(Request $request, $users){

   $this->validate($request,[
    'name' => ['required', 'string', 'max:255'],
    'fname' => ['required', 'string', 'max:255'],
    'phone' => ['required', 'string', 'max:10'],
    'branch' => ['required', 'string'],
    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    'password' => ['required', 'string', 'min:8', 'confirmed'],
]);

   $user = User::create([
    'name' => $request->input('name'),
    'fullname' => $request->input('fname'),
    'phone' => $request->input('phone'),
    'email' => $request->input('email'),
    'branncode' => $request->input('branch'),
    'password' => Hash::make($request->input('password')),
]);


   if ($users == 'admin') {
      $user->assignRole('admin');
  }else{
      $user->assignRole('worker');
  }


  if ($request->has('img')) {
    $user->img =  $request->file('img')->store('profileimage','public');
    $user->save();
}else{
   $user->img =  'default/avatar.png';
   $user->save();
}  


return Redirect()->back()->with('message','User Added Successfully!');



}




public function quantity_update($id){
   $product = Product::where('id',$id)->first();
   return view('Product.update_product',['product'=>$product]);
}


public function quantity_update_save(Request $request, $id){
   $this->validate($request,[
      'prodcut-add'=> 'required'
  ]);

   $product = Product::where('id',$id)->first();
   $qty = $product->quantuty;
   $add = $qty + $request->input('prodcut-add');

   $product->quantuty = $add;
   $product->save();


   return Redirect()->route('view-product')->with('message','Product Quantity Updated Successfully!');


}



public function login_worker(){
   return view('UserRoles.worker_login');
}



public function login_worker_script(Request $request){
   $this->validate($request,[
      'uname'=> 'required',
      'password'=> 'required'
  ]);

   $uname = $request->input('uname');
   $pass = $request->input('password');


   $user = User::where('name',$uname)->first();
   if ($user) {
      $email = $user->email;
      $credentials = ['email'=> $email, 'password'=> $pass];

      if (Auth::attempt($credentials)) {
       return redirect()->route('record-usersales');
   }

   return Redirect()->back()->with('messages','Username or Password Incorrect!');

}else{
  return Redirect()->back()->with('messages','Username or Password Incorrect!');
}
}




}
