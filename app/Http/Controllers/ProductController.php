<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\ProductCollection;
//use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
         $this->middleware('auth:api')->except('index','show');
    }
    
     public function index()
    {
        $data = ProductCollection::collection(Product::paginate(10));
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        /*         $product=[];
        //        $productData = $request->all();
                $product['name'] = $request->name;
                $product['detail'] = $request->name;
                $product['stock'] = $request->stock;
                $product['price'] = $request->price;
                $product['discount'] = $request->discount;
                Product::addProduct($product);
                return response([
        
                    'data' => new ProductResource($product)
                ], 201);
            }
*/
$product = new Product();
$product->name = $request->name;
$product->detail = $request->detail;
$product->stock = $request->stock;
$product->price = $request->price;
$product->discount = $request->discount;
$product->save();
return response([
        
    'data' => new ProductResource($product)
],Response::HTTP_CREATED);

    }    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());//$PRODUCT OLD DATA //$REQUEST -> OLD DATA
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return response(null,Response::HTTP_NO_CONTENT);

    }
}
