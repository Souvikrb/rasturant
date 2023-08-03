<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class ProductController extends Controller
{
    public function create()
    {
        
        return view('administrator/ProductManager/add-product');
    }

    public function index()
    {
        $data = product::all();
        return view('administrator/ProductManager/products',array('data'=>$data));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product'     => 'required|unique:products',
            'rgPrice'     => 'numeric',
            'slPrice'     => 'required|numeric',
            'prodImg'     => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'type'        => 'required',
            'status'      => 'required',
        ]);

        //$path = $request->file('prodImg')->store('public/uploads');

        $imageName = str_replace(' ', '', $request->product) . '.' . $request->prodImg->extension();
        $path = $request->prodImg->storeAs('products', $imageName);


        $data = new product();
        $data['product']     = $request->product;
        $data['rgPrice']     = $request->rgPrice;
        $data['slPrice']     = $request->slPrice;
        $data['prodImg']     = $path;
        $data['type']        = $request->type;
        $data['status']      = $request->status;
        $data->save();
        return redirect('/add-product');
    }

    public function destroy($id)
    {
        echo $id;
        
    }
}
