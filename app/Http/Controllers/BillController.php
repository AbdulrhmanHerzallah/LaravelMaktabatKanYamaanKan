<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Bill;
use App\Models\Product;
use App\Http\Requests\BillRequest;
use Carbon\Carbon;
use \PDF;



use App\Http\Requests\BillWithoutBillNumberRequest as PrintPdfRequest;
use Illuminate\Support\Facades\Validator;

class BillController extends Controller
{

    public function create()
    {
       $rand_number = 'KYK'.mt_rand(1000000,9999999);
       $bill_number = Bill::where('bill_number' , '=' , $rand_number)->first();

       if ($bill_number)
       {
           $rand_number = 'KYK'.mt_rand(1000000,9999999);
       }
        return view('dashboard.bill.create' , compact('rand_number'));
    }

        public function store(BillRequest $request , Bill $bill)
        {

        $user = User::find(auth()->id());
        $bill->tax = $request->tax;
        $bill->bill_type = $request->bill_type;
        $bill->bill_number = $request->bill_number;
        $bill->date = Carbon::now()->isoFormat('YYYY-MM-DD');
        $bill->clint_name = $request->clint_name;
        $bill->clint_phone = $request->clint_phone;
        $bill->clint_address = $request->clint_address;
        $user->bills()->save($bill);

        foreach ($request->product_name as $index => $item)
        {
            $bill->products()->saveMany([
            new Product
            ([
                'name' => $item ,
                'dis_account' => $request->dis_account[$index],
                'price' => $request->price[$index],
                'quantity' => $request->quantity[$index],
                'note' => $request->note[$index],
             ])]
            );
        }
            return response()->json(['success' => __('messages.success_bill_save')]);
    }

    public function print_bill(PrintPdfRequest $request)
    {
        $bill = Bill::where('bill_number', '=', $request->bill_number)->first();
        if ($bill)
        {
            $products = $bill->products;

            $prices = [];
            foreach ($products as $i) {
                $prices[] = ( $i->price -  ($i->price * ($i->dis_account / 100))) * $i->quantity;

//                    ($i->price + $i->dis_account) * $i->quantity;
            }

            $total_prices = array_sum($prices);
            $vatDecimal = (float)($bill->tax / 100);
            $total_tax = $total_prices + $total_prices * $vatDecimal;

            $date = Carbon::now();
            $hijri = \Alkoumi\LaravelHijriDate\Hijri::DateMediumFormat('en', $date);

            $data = ['data' => [
                'data' => $bill->products,
                'total_prices' => array_sum($prices),
                'total_tax' => $total_tax,
                'bill_type' => $bill->bill_type,
                'tax' => $bill->tax,
                'total_tax_expend' => array_sum($prices) * ($bill->tax/100),
                'date' => $hijri,
                'bill_number' => $bill->bill_number,
                'clint_name' => $bill->clint_name,
                'clint_phone' => $bill->clint_phone,
                'clint_address' => $bill->clint_address
            ]];
            $pdf = PDF::loadView('pdf.bill', $data);
//        $pdf->setOption('footer-left' , 'footer');
            return $pdf->download($bill->bill_number.'.pdf');
        }
        return "<script>window.close()</script>";
    }

    public function showMyBill()
    {
        $user = User::find(auth()->id());
         $bills = $user->bills()->paginate(10);

         $data = [];
        foreach ($bills as $i){
            $data[] = $i->id;
        }

        if (!$data)
        {
            alert()->info('لا يوجد فواتير','عزيزي المستخدم لم تقم بأنشاء اي فاتورة من قبل.');
        }

        return view('dashboard.bill.my-bill.show' , compact('bills'));
    }


    public function showAllBillByAdmin()
    {
        $bills = Bill::paginate(10);

        $data = [];
        foreach ($bills as $i){
            $data[] = $i->id;
        }

        if (!$data)
        {
            alert()->info('لا يوجد فواتير','قاعدة البينات فارغة من الفواتير.');
        }

        return view('dashboard.bill.all-bills-admin.show' , compact('bills'));
    }


    public function showBillStream($id)
    {
        $bill = Bill::find($id);

        if ($bill)
        {
            $products = $bill->products;

            $prices = [];
            foreach ($products as $i) {
                $prices[] = ( $i->price -  ($i->price * ($i->dis_account / 100))) * $i->quantity;

//                    ($i->price + $i->dis_account) * $i->quantity;
            }

            $total_prices = array_sum($prices);
            $vatDecimal = (float)($bill->tax / 100);
            $total_tax = $total_prices + $total_prices * $vatDecimal;

            $date = $bill->created_at;
            $hijri = \Alkoumi\LaravelHijriDate\Hijri::DateMediumFormat('en', $date);

            $data = ['data' => [
                'data' => $bill->products,
                'total_prices' => array_sum($prices),
                'total_tax' => $total_tax,
                'bill_type' => $bill->bill_type,
                'tax' => $bill->tax,
                'total_tax_expend' => array_sum($prices) * ($bill->tax/100),
                'date' => $hijri,
                'bill_number' => $bill->bill_number,
                'clint_name' => $bill->clint_name,
                'clint_phone' => $bill->clint_phone,
                'clint_address' => $bill->clint_address
            ]];
            $pdf = PDF::loadView('pdf.bill', $data);
            return $pdf->stream($bill->bill_number.'.pdf');
        }
        return "<script>window.close()</script>";
    }


    public function dellBill(Request $request)
    {
        $bill = Bill::find($request->id);
        $bill->delete();
        return redirect()->back();

    }


}
