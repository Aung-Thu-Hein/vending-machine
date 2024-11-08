<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $sort_by = $request->get('sort_by', 'name');
        $sort_direction = $request->get('sort_direction', 'asc');

        $products = Product::getProducts($sort_by, $sort_direction);

        return view('products.index', [
            'products' => $products,
            'sort_by' => $sort_by,
            'sort_direction' => $sort_direction
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('products.create', [
            'categories' => $categories
        ]);
    }

    public function store(ProductRequest $request)
    {
        $product_data = [
            'name' => $request->input('product_name'),
            'category_id' => $request->input('category'),
            'price' => $request->input('price'),
            'available_quantity' => $request->input('quantity'),
        ];

        DB::beginTransaction();
        try {
            Product::create($product_data);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();

        return redirect()->route('admin.products.index');
    }

    public function show(Product $product)
    {
        $categories = Category::all();

        return view('products.show', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update(ProductRequest $request)
    {
        $product = Product::find($request->id);

        if (!$product) {
            abort(404);
        }

        DB::beginTransaction();
        try {
            $product->name = $request->input('product_name');
            $product->category_id = $request->input('category');
            $product->price = $request->input('price');
            $product->available_quantity = $request->input('quantity');

            $product->save();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();

        return redirect()->route('admin.products.index');
    }

    public function delete(Product $product)
    {
        $product = Product::find($product->id);

        if (!$product) {
            abort(404);
        }

        DB::beginTransaction();
        try {
           $product->delete();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();

        return redirect()->route('admin.products.index');
    }

    public function list()
    {
        return view('home', [
            'products' => Product::with(['transaction', 'category'])->paginate(10)
        ]);
    }

    public function detail(Product $product)
    {
        return view('products.detail', [
            'product' => $product
        ]);
    }
}
