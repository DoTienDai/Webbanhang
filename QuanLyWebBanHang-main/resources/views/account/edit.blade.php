@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Thông Tin Cá Nhân</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('account.update') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Họ Tên</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name ?? '' }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email ?? '' }}">
        </div>
        <div class="form-group">
            <label for="phone">Số điện thoại</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone ?? '' }}">
        </div>
        <div class="form-group">
            <label for="birthdate">Ngày sinh</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ $user->birthdate ?? '' }}">
        </div>
        <div class="form-group">
            <label for="gender">Giới tính</label>
            <div>
                <input type="radio" id="male" name="gender" value="male" {{ ($user->gender ?? '') == 'male' ? 'checked' : '' }}>
                <label for="male">Nam</label>
                <input type="radio" id="female" name="gender" value="female" {{ ($user->gender ?? '') == 'female' ? 'checked' : '' }}>
                <label for="female">Nữ</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Sửa Thông Tin</button>
    </form>

    <form action="{{ route('account.deactivate') }}" method="POST" class="mt-3">
        @csrf
        <button type="submit" class="btn btn-danger">Vô Hiệu Hóa Tài Khoản</button>
    </form>
</div>
@endsection
