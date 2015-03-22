<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Images;
use App\Products;
use App\sCategory;
use Illuminate\Http\Request;
use Session;
use App\Cart;


class ProductController extends Controller {

	public function greetings(Products $products, Images $i, sCategory $c)
    {

        $count = count(Cart::where('userID', Session::get('userID'))->get());
//        dd(Session::get('productCount'));
        $cid = $c->where('name', 'Greetings')->get(['id'])->toArray(); // Gets the id of he category name Greetings
//        dd($cid);
        $products = $products->where('category',$cid[0]['id'])->get();
        $images = $i->all();
//        dd($images);
        /*
         * If the images are alredy saved in the folder then it wont be saved in the database
         */
        return view('products.greetings', compact('products', 'images', 'count') );
    }


    /*
     * This section is for displaying paintings
     *
     */
    public function paintings(Products $products, Images $i, sCategory $c)
    {
        dd(Session::get('userID'));
        $count = count(Cart::where('userID', Session::get('userID'))->get());
        $cid = $c->where('name', 'Paintings')->get(['id'])->toArray(); // Gets the id of he category name Greetings

        $products = $products->where('category',$cid[0]['id'])->get();
        $images = $i->all();
//        dd($images);
        return view('products.greetings', compact('products', 'images', 'count') );
    }


    /*
     * This section is for displaying paintings
     *
     */
    public function envelopes(Products $products, Images $i, sCategory $c)
    {
        $count = count(Cart::where('userID', Session::get('userID'))->get());
        $cid = $c->where('name', 'Envelopes')->get(['id'])->toArray(); // Gets the id of he category name Greetings

        $products = $products->where('category',$cid[0]['id'])->get();
        $images = $i->all();
//        dd($images);
        return view('products.greetings', compact('products', 'images', 'count') );
    }

    public function portraits(Products $products, Images $i, sCategory $c)
    {
        $count = count(Cart::where('userID', Session::get('userID'))->get());
        $cid = $c->where('name', 'Portraits')->get(['id'])->toArray(); // Gets the id of he category name Greetings

        $products = $products->where('category',$cid[0]['id'])->get();
        $images = $i->all();
//        dd($images);
        return view('products.greetings', compact('products', 'images', 'count') );
    }

    public function letters(Products $products, Images $i, sCategory $c)
    {
        $count = count(Cart::where('userID', Session::get('userID'))->get());
        $cid = $c->where('name', 'Letters')->get(['id'])->toArray(); // Gets the id of he category name Greetings

        $products = $products->where('category',$cid[0]['id'])->get();
        $images = $i->all();
//        dd($images);
        return view('products.greetings', compact('products', 'images', 'count') );
    }


    public function single($pid,$name,$brand,$size,$price,$type,$design,$image)
    {
//        $product = [
//            ['name'=>$name,
//                'brand'=>$brand,
//                'size'=>$size,
//                'price'=>$price,
//                'type'=>$type,
//                'design'=>$design,
//                'image'=>$image
//            ]
//        ];
//        dd($image);
        $imageName = $image;
        $description = Products::where("id", $pid)->get(['description'])->toArray();
        $images = Images::where("product", $pid)->get(['name', 'url']);
        return view('products.single', compact('pid','name','brand','size','price','type','design','images','description','imageName'));
    }

    /*
     * This is the query form for the pc consultant
     */
    public function query(Request $request)
    {
        if($request->isMethod("put"))
        {

        }
    }
    /*
     * I have set the count variables in all he controllers which will pass the data to the view with cart
     * total items.
     */


}
