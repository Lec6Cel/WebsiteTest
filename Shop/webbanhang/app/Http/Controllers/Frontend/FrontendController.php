<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Orders;

class FrontendController extends Controller {
    public function index(Request $request){
        $productList = DB::table('product')
                ->where('deleted',0)
                ->take(12)
                ->get();

        return view('frontend.home')->with([
           'productList' => $productList,
           'mainClass' => 'hero_area',
           'title' => 'Trang Chủ - TrungNhom',
           'cartNum' => $this->getCartNum(),
        ]);
    }


    public function showProducts(Request $request){
        $productList = DB::table('product')
            ->where('deleted', 0)
            ->paginate(8);

         return view('frontend.category')->with([
            'productList' => $productList,
           'mainClass' => 'sub_page',
           'title' => 'Sản Phẩm',
           'cartNum' => $this->getCartNum(),
        ]);
    }


    public function showDetail(Request $request , $id , $href_param){
        $detail = DB::table('product')
            ->where('deleted', 0)
            ->where('id',$id)
            ->get();


        if($detail == null || count($detail) == 0) {
            return view('frontend.error')->with([
                'mainClass' => 'sub_page',
                'title' => 'Trang không tồn tại',
            ]);
        }

        $productList = DB::table('product')
            ->where('deleted', 0)
            ->paginate(8);

         return view('frontend.detail')->with([
                'mainClass' => 'sub_page',
                'title' => $detail[0]->title,
                'detail' => $detail[0],
                'productList' => $productList,
                'cartNum' => $this->getCartNum(),
            ]);
    }


    public function showNews(Request $request){
        $newsList = DB::table('news')
            ->where('deleted', 0)
            ->paginate(9);

         return view('frontend.news')->with([
            'mainClass' => 'sub_page',
            'title' => 'Tin Tức',
            'newsList' => $newsList,
            'cartNum' => $this->getCartNum(),
        ]);
    }

    public function showPost(Request $request , $id , $href_param){
        $post = DB::table('news')
            ->where('deleted', 0)
            ->where('id',$id)
            ->get();

         $newsList = DB::table('news')
            ->where('deleted', 0)
            ->take(3)
            ->get();

        if($post == null || count($post) == 0) {
            return view('frontend.error')->with([
                'mainClass' => 'sub_page',
                'title' => 'Trang không tồn tại',
            ]);
        }

         return view('frontend.post')->with([
                'mainClass' => 'sub_page',
                'title' => $post[0]->title,
                'post' => $post[0],
                'newsList' => $newsList,
                'cartNum' => $this->getCartNum(),
            ]);
    }

    public function showContact(Request $request)
    {
        return view('frontend.contact')->with([
            'mainClass' => 'sub_page',
            'title' => 'Liên Hệ',
            'cartNum' => $this->getCartNum(),
        ]);
    }


    public function postContact(Request $request)
    {
        DB::table('feedback')
            ->insert([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'subject_name' => $request->subject_name,
                'note' => $request->note,
            ]);

        return redirect()->route('frontend.contact');
    }

    public function showCart(Request $request) {
        $cartList = [];
        if(isset($_COOKIE['cart'])) {
            $cartList = json_decode($_COOKIE['cart']);
        }
        $idList = [];
        foreach ($cartList as $item) {
            $idList[] = $item->id;
        }

        $cartItems = DB::table('product')
            ->where('deleted', 0)
            ->whereIn('id', $idList)
            ->get();
        for ($i=0; $i < count($cartItems); $i++) { 
            for ($j=0; $j < count($cartList); $j++) { 
                if($cartItems[$i]->id == $cartList[$j]->id) {
                    $cartItems[$i]->num = $cartList[$j]->num;
                    break;
                }
            }
        }

        return view('frontend.cart')->with([
            'mainClass' => 'sub_page',
            'title' => 'Giở Hàng - Gokisoft Học Lập Trình A - Z',
            'cartItems' => $cartItems,
            'cartNum' => $this->getCartNum()
        ]);
    }

    private function getCartNum() {
        $cartList = [];
        if(isset($_COOKIE['cart'])) {
            $cartList = json_decode($_COOKIE['cart']);
            $num = 0;
            foreach ($cartList as $item) {
                $num += $item->num;
            }
            return $num;
        } else {
            return 0;
        }
    }


    public function showCheckout(Request $request){
       $cartList = [];
        if(isset($_COOKIE['cart'])) {
            $cartList = json_decode($_COOKIE['cart']);
        }
        $idList = [];
        foreach ($cartList as $item) {
            $idList[] = $item->id;
        }

        $cartItems = DB::table('product')
            ->where('deleted', 0)
            ->whereIn('id', $idList)
            ->get();
        for ($i=0; $i < count($cartItems); $i++) { 
            for ($j=0; $j < count($cartList); $j++) { 
                if($cartItems[$i]->id == $cartList[$j]->id) {
                    $cartItems[$i]->num = $cartList[$j]->num;
                    break;
                }
            }
        }

        return view('frontend.checkout')->with([
            'mainClass' => 'sub_page',
            'title' => 'Thanh Toán',
            'cartItems' => $cartItems,
            'cartNum' => $this->getCartNum()
        ]);
    }

    public function completeCheckout(Request $request){
        $cartList = [];
        if(isset($_COOKIE['cart'])) {
            $cartList = json_decode($_COOKIE['cart']);
        }
    
        if($cartList == null || count($cartList) == 0) {
            return redirect()->route('home_index');
        }   
    
        // Kiểm tra dữ liệu nhập vào
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'address' => 'required',
            'note' => 'required',
        ]);
    
        // Nếu dữ liệu không hợp lệ, redirect về trang thanh toán với thông báo lỗi
        if ($validator->fails()) {
            return redirect()->route('home_index')
                             ->withErrors($validator)
                             ->withInput();
        }
    
        $idList = [];
        foreach ($cartList as $item) {
            $idList[] = $item->id;
        }
    
        $cartItems = DB::table('product')
            ->where('deleted', 0)
            ->whereIn('id', $idList)
            ->get();
    
        $totalMoney = 0;    
        for ($i=0; $i < count($cartItems); $i++) { 
            for ($j=0; $j < count($cartList); $j++) { 
                if($cartItems[$i]->id == $cartList[$j]->id) {
                    $cartItems[$i]->num = $cartList[$j]->num;
                    $totalMoney += $cartItems[$i]->num * $cartItems[$i]->discount;
                    break;
                }
            }
        }
        $orderItem = Orders::create([
            'user_id' => null,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'note' => $request->note,
            'status' => 0,
            'order_date' => date('Y-m-d H:i:s'),
            'total_money' => $totalMoney,
        ]);
    
        foreach ($cartItems as $item) {
            DB::table('order_details')-> insert([
                'order_id' => $orderItem -> id,
                'product_id' => $item -> id,
                'price' => $item -> discount,
                'num' => $item -> num,
                'total_money' => $item -> num * $item -> discount,
            ]);
        }
    
        setcookie("cart",'',time(),'/');
    
        return redirect()->route('home_index');
    }
    // public function showLogin()
    // {
    //     return view('auth.login')->with([
    //         'mainClass' => 'sub_page',
    //         'title' => 'Đăng Nhập',
    //     ]);
    // }

    // public function postLogin(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');
    
    //     if (Auth::attempt($credentials)) {
    //         Authentication passed...
    //         return redirect()->intended(route('home_index'));
    //     }
    
    //     return redirect()->back()->withErrors([
    //         'email' => 'Thông tin đăng nhập không đúng.',
    //     ]);
    // }

    // public function showRegister()
    // {
    //     return auth('frontend.register')->with([
    //         'mainClass' => 'sub_page',
    //         'title' => 'Đăng Ký',
    //     ]);
    // }

    // public function postRegister(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');
    
    //     if (Auth::attempt($credentials)) {
    //         Authentication passed...
    //         return redirect()->intended(route('home_index'));
    //     }
    
    //     return redirect()->back()->withErrors([
    //         'email' => 'Thông tin đăng nhập không đúng.',
    //     ]);
    // }
}
