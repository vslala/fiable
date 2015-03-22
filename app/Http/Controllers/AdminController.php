<?php namespace App\Http\Controllers;

use App\Admin;
use App\Blog;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Images;
use App\mCategory;
use App\Products;
use App\sCategory;
use App\Contact;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller{


    public function __construct()
    {
        return session_start();
    }


	public function login(Request $request, Admin $admin)
    {
        if(isset($_SESSION['admin'])) return redirect(route('adminHome'));

        if($request->isMethod('put'))
        {
            $auth = $admin->loginCheck($request->get('username'), $request->get('password'));
            if($auth)
            {
                $_SESSION['admin'] = $request->get('username');
                return redirect(route('adminHome'));
            }else{
                $message = "Invalid username or password!!!";
                return view('admin.login', compact('admin','message'));
            }

        }

        return view('admin.login', compact('admin'));
    }

    public function home()
    {
        if (!isset($_SESSION["admin"])) return redirect(route("adminLogin"));

        $contact = new Contact();
        $q = $contact->all();
        return view('admin.home',  compact('q'));
    }

    public function blog(Blog $blog)
    {
        if(!isset($_SESSION['admin'])) return redirect(route('adminLogin'));
        $blogs = $blog->all();       
        return view('admin.blog', compact('blog','blogs'));
    }

    public function create()
    {
        if (!isset($_SESSION["admin"])) return redirect(route("adminLogin"));

        return view('admin.create');
    }

    public function store(Request $request)
    {
        if (!isset($_SESSION["admin"])) return redirect(route("adminLogin"));
        /*
         * This is for the form validation.
         * if the form is not validated properly it will return an array of error string.
         */
        $this->validate($request, [
            'username'=>'required',
            'heading'=>'required',
            'content'=>'required',
            'file'=>'required'
        ]);

        if($request->isMethod('put'))
        {
            if($request->hasFile('file')){
                $file = $request->file('file');

                $blog = new Blog();
                $blog->username = $request->get('username');
                $blog->heading = $request->get('heading');
                $blog->content = $request->get('content');
                $blog->image = "img/admin/".$file->getClientOriginalName();
                //dd($file);
                if($blog->save())
                {
                    $file->move("public/img/admin/", $file->getClientOriginalName());
                }
                return redirect(route('adminBlog'));
            }else {
                $_SESSION['message'] = "Please choose the file for the product";
                return redirect(route('adminBlog'));
            }

        }
    }
    public function edit($blogID, Blog $blog)
    {
        if (!isset($_SESSION["admin"])) return redirect(route("adminLogin"));

        $blog = $blog->where('id',$blogID)->first();
        return view('admin.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog, $blogID)
    {
        if (!isset($_SESSION["admin"])) return redirect(route("adminLogin"));

        /*
         * This is for the form validation.
         * if the form is not validated properly it will return an array of error string.
         */
        $this->validate($request, [
            'username'=>'required',
            'heading'=>'required',
            'content'=>'email|required',
            'image'=>'required',
        ]);

        if($request->isMethod('put'))
        {
            $blog = $blog->where('id', $blogID)->first();
            $file = $request->file('file');
            $blog->image = 'img/admin/'.$file->getClientOriginalName();
            $blog->username = $request->get('username');
            $blog->heading = $request->get('heading');
            $blog->content = $request->get('content');
            $file->move("public/img/admin", $file->getClientOriginalName());
            //dd($file->getClientOriginalName());
            $blog->save();
            return redirect(route('adminBlog'));
        }
    }

    public function delete($blogID, blog $blog)
    {
        if (!isset($_SESSION["admin"])) return redirect(route("adminLogin"));

        $blog = $blog->where('id', $blogID)->first();
        $blog->delete();
        return redirect(route('adminBlog'));
    }

    public function product(sCategory $cat)
    {
        if (!isset($_SESSION["admin"])) return redirect(route("adminLogin"));

        $categories = $cat->all();
        return view('admin.product', compact('categories'));
    }

    public function newProduct(Request $request)
    {
        if (!isset($_SESSION["admin"])) return redirect(route("adminLogin"));

        /*
         * This is for the form validation.
         * if the form is not validated properly it will return an array of error string.
         */
        if($request->isMethod('put')){
            $this->validate($request, [
                'name'=>'required',
                'brand'=>'required',
                'description'=>'required',
                'size'=>'required',
                'price'=>'required',
                'type'=>'required',
                'design'=>'required',
                'stock'=>'required',
                'category'=>'required'
//                'files'=>'required'
            ]);

            $name = $request->get('name');
            $brand = $request->get('brand');
            $desc = $request->get('description');
            $size = $request->get('size');
            $price = $request->get('price');
            $type = $request->get('type');
            $design = $request->get('design');
            $stock = $request->get('stock');
            $category = $request->get('category');

//            if($request->hasFile('files'))
//            {
                /*
                 * createProduct return the last inserted product id
                 * The pid is then supplied to the image class to insert as a foreign key
                 */
                $product = new Products();
                $pid = $product->createProduct($name,$brand,$desc,$size,$price,$type,$design,$stock,$category);

                $files = $request->file('files');
                $file = new Images();
                $file->uploadMultiple($pid,"public/img/products/","img/products/", $files);

                return redirect(route('adminProduct'));
//            }
        }


    }

    /*
        Category form request will be forwarded here.
    */
    public function category(Request $request, sCategory $category)
    {
        if (!isset($_SESSION["admin"])) return redirect(route("adminLogin"));

        $categories = new mCategory();
        $categories = $categories->all();
        if($request->isMethod('put'))
        {
            /*
             * This is the default validation method
             */
            $this->validate($request, [
                'name'=>'required',
                'mainCategory'=>'required',
                'file'=>'required'
            ]);

            if($request->hasFile('file'))
            {
                $file = $request->file('file');
                $file->move('public/img/category', $file->getClientOriginalName());
                $name = $request->get('name');
                $category->name = $name;
                $category->c_id = $request->get('mainCategory');
                $category->image = $file->getClientOriginalName();
                $category->url = "img/category/".$file->getClientOriginalName();
                $category->save();
                return view('admin.category', compact('categories'))->with('message', 'Category created Successfully!');
            }



        }
        return view('admin.category', compact('categories'));
    }

    public function logout()
    {
        session_destroy();

        return redirect(route('adminLogin'));
    }

    public function addImage(Request $request)
    {
        if (!isset($_SESSION["admin"])) return redirect(route("adminLogin"));

        $products = DB::select("SELECT name,brand,id FROM products LIMIT 10");

        if($request->isMethod('put'))
        {
            $file = new Images();
//            dd($request->file('files'));
            $files = $request->file('files');
            $file->uploadMultiple($request->get('pid'), "public/img/products", "img/products/", $files);
            return view('admin.addImage', compact('products'));
        }


        return view('admin.addImage', compact('products'));
    }

}
