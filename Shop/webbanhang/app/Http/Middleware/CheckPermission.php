<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra xem người dùng có đăng nhập không
        if (Auth::check()) {
            // Lấy thông tin người dùng hiện tại
            $user = Auth::user();

            // Kiểm tra quyền hạn của người dùng
            if ($user->role_id != 1) {
                // Nếu người dùng không có quyền hạn, bạn có thể chuyển hướng họ đến một trang khác
                // hoặc hiển thị một thông báo lỗi.
                return redirect()->route('home_index');
            }
        } else {
            // Nếu người dùng không đăng nhập, bạn cũng có thể chuyển hướng họ đến trang đăng nhập.
            return redirect()->route('login');
        }

        // Nếu người dùng có quyền hạn, chuyển họ đến đích mong muốn.
        return $next($request);
    }
}
