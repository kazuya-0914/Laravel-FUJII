<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Vendor;
use App\Services\WeatherService;
use Illuminate\Support\Facades\Schema;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // 天気予報
    protected $weatherService;
    protected $weatherData;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
        $this->weatherData = $this->weatherService->getWeatherData();
    }
    // 天気予報ここまで

    public function index()
    {
        $columns = Schema::getColumnListing('products');
        $products = Product::all();

        // ブレードバージョン
        //return view('products.index', compact('columns', 'products'));

        // Vue.jsバージョン
        
        return Inertia::render('Products/Index', [
            'weatherData' => $this->weatherData,
            'columns' => $columns,
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendor_codes = Vendor::pluck('vendor_code');
        return view('products.create', compact('vendor_codes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->price = $request->input('price');
        $product->vendor_code = $request->input('vendor_code');
        $product->save();

        // リダイレクトさせる
        return redirect("/products/{$product->id}");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $columns = Schema::getColumnListing('products');
        $product = Product::find($id);

        // ブレードバージョン
        return view('products.index', compact('columns', 'product'));

        // Vue.jsバージョン
        /*
        return Inertia::render('Products/Index', [
            'weatherData' => $this->weatherData,
            'columns' => $columns,
            'product' => $product,
        ]);
        */
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}