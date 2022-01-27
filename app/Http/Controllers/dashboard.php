<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class dashboard extends Controller
{
    public function home()
    {
        $id = session('user')->id;

        $count = cart::where('userId', $id)->get()->count();
        return view('dashboard.home', ['count' => $count]);
    }
    public function menu()
    {
        $menuData = menu::all();
        return view('dashboard.menu', ['menuData' => $menuData]);
    }
    public function addPizza()
    {
        return view('dashboard.addPizza');
    }
    public function postAddPizza(Request $data)
    {
        $validate = $data->validate([
            'name' => 'required',
            'type' => 'required',
            'price' => 'required',
            'description' => 'required',
            'file' => 'required'
        ]);
        if ($validate) {
            $file = $data->file('file');
            $dest = public_path('/uploads');
            $fname = "Image-" . rand() . "-" . time() . "." . $file->extension();
            if ($file->move($dest, $fname)) {
                $newPizza = new menu;
                $newPizza->name = $data->name;
                $newPizza->price = $data->price;
                $newPizza->description = $data->description;
                $newPizza->type = $data->type;
                $newPizza->image_path = $fname;
                $newPizza->Quantity = 1;
                if ($newPizza->save()) {
                    return redirect('dashboard/menu');
                } else {
                    return back()->with('fileError', "Uploading Error");
                }
            } else {
                $path = public_path() . "uploads/" . $fname;
                unlink($path);
            }
        }
    }
    public function addToCart(Request $pizzaData)
    {
        $cart = new cart();
        $cart->name = $pizzaData->name;
        $cart->price = $pizzaData->price;
        $cart->image_path = $pizzaData->image_path;
        $cart->menuId = $pizzaData->id;
        $cart->quantity = 1;
        $cart->userId = $pizzaData->userId;
        $cart->userName = $pizzaData->userName;
        if ($cart->save()) {
            $id = session('user')->id;
            $email = session('user')->email;
            $count = cart::where('userId', $id)->get()->count();
            session()->put($email, $count);
            return redirect('/dashboard/menu');
        }
    }
    public function cart()
    {
        $id = session('user')->id;
        $cartItems = cart::where('userId', $id)->get();
        return view('dashboard.cart', ['cartItems' => $cartItems]);
    }
    public function checkout($amount)
    {
        $total = $amount;
        return view('dashboard.checkout', ['total' => $total]);
    }
    public function deleteCartItem(Request $req)
    {
        $cart = cart::find($req->cid);
        if ($cart->delete()) {
            $id = session('user')->id;
            $email = session('user')->email;
            $count = cart::where('userId', $id)->get()->count();
            session()->put($email, $count);
            return "Category deleted";
        } else {
            return "category Not deleted";
        }
    }
    public function payment(Request $paymentData)
    {

        $validate = $paymentData->validate([
            'card' => 'required'
        ]);
        if ($validate) {
            $id = session('user')->id;
            $email = session('user')->email;
            $cartItems = cart::where('userId', $id)->get();
            $data = ['name' => 'Pizza World', 'data' => $cartItems];
            $user['to'] = $email;
            Mail::send('dashboard.mail', $data, function ($messages) use ($user) {
                $messages->to($user['to']);
                $messages->subject('Order Placed');
            });
            $cart = cart::where('userId', $paymentData->uid);
            if ($cart->delete()) {
                $count = cart::where('userId', $id)->get()->count();
                session()->put($email, $count);
                return redirect('/dashboard/cart')->with('success', 'order placed seccessfully');
            }
        }
    }
    public function updateQuantity(Request $qdata)
    {
        cart::where('id', $qdata->qid)->update([
            'quantity' => $qdata->quantity
        ]);
    }
}
