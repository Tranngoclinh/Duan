@extends('home')
@section('title', 'Chỉnh sửa khách hàng')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12"><h1>Chỉnh sửa khách hàng</h1></div>
            <div class="col-12">
                <form method="post" action="{{ route('customers.update', $customer->id) }}">
                    @csrf
                    <div class="form-group">
                        <label>Tên khách hàng</label>
                        <input type="text" class="form-control" name="name" value="{{ $customer->name }}" >
                        @if ($errors->any())
                          <p style="color:red">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Tuổi khách hàng</label>
                        <input type="text" class="form-control" name="age" value="{{ $customer->age }}" >
                        @if ($errors->any())
                          <p style="color:red">{{ $errors->first('age') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $customer->email }}" >
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('email') }}</p>
                      @endif
                    </div>
                    <div class="form-group">
                        <label>Số Điện Thoại</label>
                        <input type="text" class="form-control" name="phone" value="{{ $customer->phone }}" >
                        @if ($errors->any())
                          <p style="color:red">{{ $errors->first('phone') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ khách hàng</label>
                        <input type="text" class="form-control" name="address" value="{{ $customer->address }}" >
                        @if ($errors->any())
                          <p style="color:red">{{ $errors->first('address') }}</p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                    <a href="{{route('customers.index')}}" class="btn btn-secondary" >Hủy</a>
                </form>
            </div>
        </div>
    </div>
@endsection