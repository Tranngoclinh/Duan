@extends('home')
@section('title', 'Đăng Nhập')

@section('content')
<div>
   <form action="{{route('adminlogin')}}" method="post">
      @csrf
      Email: 
      <input type="email" name="email" placeholder="Nhập email"><br>
      Mật Khẩu:
      <input type="password" name="password" placeholder="Nhập mật khẩu"><br>
      <input type="submit" value="Đăng Nhập">
   </form>
</div>
@endsection