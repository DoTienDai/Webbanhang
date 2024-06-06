<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        
        // Kiểm tra nếu $user là null, có thể chuyển hướng hoặc thông báo lỗi
        if (!$user) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }

        return view('account.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'nullable|string|max:15',
            'birthdate' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
        ]);

        $user->update($request->only('name', 'email', 'phone', 'birthdate', 'gender'));

        return redirect()->route('account.edit')->with('success', 'Thông tin đã được cập nhật.');
    }
    public function deactivate(Request $request)
    {
        // Lấy người dùng hiện tại đăng nhập
        $user = $request->user();
    
        // Vô hiệu hóa tài khoản của người dùng hiện tại
        $user->active = false; // Đặt trường 'active' của người dùng thành false
        $user->save();
    
        // Đăng xuất người dùng sau khi vô hiệu hóa tài khoản
        Auth::logout();
    
        // Chuyển hướng người dùng đến trang đăng nhập và hiển thị thông báo
        return redirect()->route('login')->with('success', 'Tài khoản của bạn đã bị vô hiệu hóa.');
    }
}
