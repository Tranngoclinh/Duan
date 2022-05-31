<?php

namespace App\Http\Controllers;

use App\Http\Requests\Add;
use App\Http\Requests\Update;
use App\Models\Customer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(5);
        return view('Customer.list', compact('customers'));
    }

    public function create()
    {
        return view('Customer.create');
    }

    public function store(Add $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->age = $request->age;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Tạo mới khách hàng thành công');
        //tao moi xong quay ve trang danh sach khach hang
        return redirect()->route('customers.index');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('Customer.edit', compact('customer'));
    }

    public function update(Update $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->name = $request->name;
        $customer->age = $request->age;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Cập nhật khách hàng thành công');
        //cap nhat xong quay ve trang danh sach khach hang
        return redirect()->route('customers.index');
    }
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa khách hàng thành công');
        //xoa xong quay ve trang danh sach khach hang
        return redirect()->route('customers.index');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('customers.index');
        }
        $customers = Customer::where('name', 'LIKE', '%' . $keyword . '%')->orwhere('email', 'LIKE', '%' . $keyword . '%')->orwhere('phone', 'LIKE', '%' . $keyword . '%')->paginate(5);
        return view('Customer.list', compact('customers', 'keyword'));
    }

    public function show(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        // dd($customer->phone);
        return view('Customer.show',compact('customer'));
    }
}
