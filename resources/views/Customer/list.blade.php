@extends('home')
@section('title', 'Danh sách khách hàng')
@section('content')
<style>
    a.btn.btn-primary {
        margin: 0px 884px 16px 0px;
    }
    a.btn.btn-secondary {
    margin: 0px 0px 16px 0px;
}
</style>
<div class="col-12">
    <div class="row">
        <div class="col-12">
            <h1>Danh Sách Khách Hàng</h1>
        </div>
        <div class="col-12">
            @if (Session::has('success'))
            <p class="text-success">
                <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
            </p>
            @endif
        </div>
        <table class="table table-striped">
            <div class="col-6">
                <form class="navbar-form navbar-left" action="{{route('customers.search')}}">

                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search" name='keyword'>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-default">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
            </div>
            <thead>

                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên khách hàng</th>
                    {{-- <th scope="col">Ngày Sinh</th> --}}
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th>Thao Tác</th>

                </tr>
            </thead>
            <tbody>
                @if(count($customers) == 0)
                <tr>
                    <td colspan="4">Không có dữ liệu</td>
                </tr>
                @else
                @foreach($customers as $key => $customer)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $customer->name }}</td>
                    {{-- <td>{{ $customer->dob }}</td> --}}
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>
                        <a href="{{route('customers.show',$customer->id)}}" class="text-warning	fas	fa-eye" ></a>
                        <a href="{{ route('customers.edit', $customer->id) }}" class="fas fa-edit"></a>
                        <a href="{{ route('customers.destroy', $customer->id) }}" class="text-danger fas fa-archive"
                            onclick="return confirm('Bạn chắc chắn muốn xóa?')"></a>
                    </td>
                </tr>
                @endforeach
                @endif

            </tbody>
        </table>
        <a class="btn btn-primary" href="{{ route('customers.create') }}">Thêm mới</a>
        @if (isset($keyword))
        <a href="{{route('customers.index')}}" class="btn btn-secondary">Quay Lại</a>
        @endif
        {{-- {{$customers->links()}} --}}
        {{$customers->appends(request()->query())}}
    </div>
</div>
@endsection