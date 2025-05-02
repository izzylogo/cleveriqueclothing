<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductListController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'brand', 'product_images')
            ->where('quantity', '>', 0);
        $filterProducts = $products->filtered()->paginate(12)->withQueryString();

        $categories = Category::get();
        $brands = Brand::get();
        
        return Inertia::render(
            'User/ProductList',
            [
                'categories' => $categories,
                'brands' => $brands,
                'products' => $filterProducts->items(),
                'pagination' => [
                    'links' => $filterProducts->links()->elements,
                    'current_page' => $filterProducts->currentPage(),
                    'last_page' => $filterProducts->lastPage(),
                    'per_page' => $filterProducts->perPage(),
                    'total' => $filterProducts->total()
                ]
            ]
        );
    }
}
