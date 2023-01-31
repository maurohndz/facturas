<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Purchase;
use App\Models\Product;
use App\Models\Invoice;
use App\Models\User;

class InvoicesController extends Controller
{
    protected function checkAdmin() {
        $user = Auth::user();
        $user = User::find($user->id);

        if (!$user->admin) {
            return redirect('/productos');
        }
    }

    public function index() {
        if(!Auth::check()){
            return redirect('/login');
        }

        $this->checkAdmin();

        $invoices = Invoice::all();

        return view('facturas.index', ['invoices' => $invoices]);
    }

    public function show($id) {
        if(!Auth::check()){
            return redirect('/login');
        }

        $this->checkAdmin();

        $invoice = Invoice::find($id);
        $products = DB::table('purchases')
                    ->where('invoice_id', $id)
                    ->join('products', 'purchases.product_id', '=', 'products.id')
                    ->select('products.*')->get();

        return view('facturas.show', ['invoice' => $invoice, 'products' => $products]);
    }

    public function sendInvoice($id) {
        if(!Auth::check()){
            return redirect('/login');
        }

        $this->checkAdmin();

        $invoice = Invoice::find($id);
        $invoice->billed = true;
        $invoice->save();

        return redirect('/facturas');
    }
}
