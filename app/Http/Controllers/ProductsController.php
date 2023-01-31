<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Invoice;

class ProductsController extends Controller
{
    protected function checkAdmin() {
        $user = Auth::user();
        $user = User::find($user->id);

        if (!$user->admin) {
            return redirect('/productos');
        }
    }

    public function index()
    {
        $products = Product::all();
        return view('productos.index', ['productos' => $products]);
    }

    public function create()
    {
        if(!Auth::check()){
            return redirect('/login');
        }
        
        $this->checkAdmin();
        
        return view('productos.create');
    }

    public function store(Request $request)
    {
        if(!Auth::check()){
            return redirect('/login');
        }
        
        $this->checkAdmin();

        $request->validate([
            'name' => 'required|min:3',
            'price_tax' => 'required|min:1',
            'tax' => 'required|min:1',
        ]);

        $tem = $request->tax / 100;

        $producto = new Product;
        $producto->name = $request->name;
        $producto->price = ($request->price_tax / (1 + $tem));
        $producto->price_tax = $request->price_tax;
        $producto->tax = $tem;

        $producto->save();

        return redirect('productos/nuevo')->with('success', 'Producto creado correctamente');
    }


    public function buy(Request $request) {
        if(!Auth::check()){
            return redirect('/login');
        }

        $user = Auth::user();

        $request->validate([
            'product_id' => 'required|min:1',
        ]);

        // Get Product
        $product = Product::find($request->product_id);

        if (!$product) {
            return redirect('productos');
        }

        $cost = $product->price_tax;
        $taxes = $product->price_tax - $product->price;
        $tax_free = $product->price;


        $exists_invoice = Invoice::find($user->id);

        if (!$exists_invoice) {
            $new_invoice = new Invoice;

            $new_invoice->user_id = $user->id;
            $new_invoice->total_cost = $cost;
            $new_invoice->total_taxes = $taxes;
            $new_invoice->total_tax_free = $tax_free;

            $new_invoice->save();

            $exists_invoice = $new_invoice;
        } else {
            $exists_invoice->total_cost += $cost;
            $exists_invoice->total_taxes += $taxes;
            $exists_invoice->total_tax_free += $tax_free;

            $exists_invoice->save();
        }


        $purchase = new Purchase;
        $purchase->user_id = $user->id;
        $purchase->product_id = $request->product_id;
        $purchase->invoice_id = $exists_invoice->id;

        $purchase->save();

        return redirect('productos');
    }
}
