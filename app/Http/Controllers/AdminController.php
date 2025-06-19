<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function view_category()
    {

        $categories = Category::all();

        return view('admin.category', compact('categories'));
    }

    public function add_category(Request $request)
    {

        $category = new Category;

        $category->category_name = $request->category;

        $category->save();

        toastr()->closeButton()->timeOut(5000)->addSuccess('Category Added Successfully');

        return redirect()->back();
    }

    public function delete_category($id)
    {

        $category = Category::find($id);

        $category->delete();

        toastr()->closeButton()->timeOut(5000)->addWarning('Category Deleted Successfully');

        return redirect()->back();
    }

    public function edit_category($id)
    {

        $category = Category::find($id);

        return view('admin.edit_category', compact('category'));

    }

    public function update_category(Request $request, $id)
    {

        $category = Category::find($id);

        $category->category_name = $request->category;

        $category->save();

        toastr()->closeButton()->timeOut(5000)->addSuccess('Category Updated Successfully');

        return redirect('/view_category');
    }

    public function add_product()
    {

        $categories = Category::all();

        return view('admin.add_product', compact('categories'));
    }

    public function upload_product(Request $request)
    {

        $product = new Product;

        $product->title = $request->title;
        $product->description = $request->description;

        // image upload
        $image = $request->image;

        if ($image) {

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $request->image->move('products', $imageName);

            $product->image = $imageName;
        }

        $product->price = $request->price;
        $product->category = $request->category;
        $product->quantity = $request->quantity;

        $product->save();

        toastr()->closeButton()->timeOut(5000)->addSuccess('Product Added Successfully');

        return redirect()->back();
    }

    public function view_product(){

        $products = Product::paginate(4);

        return view('admin.view_product', compact('products'));
    }

    public function delete_product($id)
    {

        $product = Product::find($id);

        $image_path = public_path('products/'.$product->image);

        if(file_exists($image_path)){

            unlink($image_path);
        }

        $product->delete();

        toastr()->closeButton()->timeOut(5000)->addWarning('Product Deleted Successfully');

        return redirect()->back();
    }

    public function edit_product($id){

        $product = Product::find($id);
        $categories = Category::all();

        return view('admin.edit_product', compact('product', 'categories'));
    }

    public function update_product(Request $request, $id)
    {

        $product = Product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;

        // image upload
        $image = $request->image;

        if ($image) {

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $request->image->move('products', $imageName);

            $product->image = $imageName;
        }

        $product->price = $request->price;
        $product->category = $request->category;
        $product->quantity = $request->quantity;

        $product->save();

        toastr()->closeButton()->timeOut(5000)->addSuccess('Product Updated Successfully');

        return redirect('view_product');
    }

    public function product_search(Request $request){

        $search = $request->search;

        $products = Product::where('title', 'LIKE', '%'.$search.'%')->orWhere('category', 'LIKE', '%'.$search.'%')->paginate(3);

        return view('admin.view_product', compact('products'));

    }

    public function view_order(){

        $orders = Order::all();

        return view('admin.view_order', compact('orders'));
    }

    public function on_the_way($id){

        $order = Order::find($id);

        $order->status = "On The Way";

        $order->save();
        return redirect()->back();
    }

    public function order_delivered($id){

        $order = Order::find($id);

        $order->status = "Delivered";

        $order->save();
        return redirect()->back();
    }

    public function order_canceled($id){

        $order = Order::find($id);

        $order->status = "Canceled";

        $order->save();

        return redirect()->back();
    }

    public function print_pdf($id){

        $order = Order::find($id);
        
        $pdf = Pdf::loadView('admin.invoice', compact('order'));
        return $pdf->download('order.pdf');

    }
}
