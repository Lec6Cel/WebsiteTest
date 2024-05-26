<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;

class LoginTest extends TestCase
{
    use DatabaseTransactions;

    public function testSuccessfulLogin()
    {
        // Tạo một user mới sử dụng factory
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // Gửi yêu cầu đăng nhập
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        // Kiểm tra phản hồi
        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($user);
    }
    
    public function testFailedLogin()
    {
        // Tạo một user mới sử dụng factory
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // Gửi yêu cầu đăng nhập với mật khẩu sai
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'wrongpassword',
        ]);

        // Kiểm tra phản hồi
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }
    public function testLoginWithRememberMe()
    {
        // Tạo một user mới sử dụng factory
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // Gửi yêu cầu đăng nhập với "Remember Me"
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password',
            'remember' => 'on',
        ]);

        // Kiểm tra phản hồi
        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($user);

        // Kiểm tra rằng cookie ghi nhớ đã được thiết lập
        $response->assertCookie(config('session.cookie'));
    }
    public function testLoginWithLoggedOutAccount()
    {
        // Tạo một user mới sử dụng factory và đăng nhập
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // Đăng nhập tài khoản
        $this->actingAs($user);

        // Đăng xuất tài khoản
        auth()->logout();

        // Gửi yêu cầu đăng nhập với tài khoản đã đăng xuất
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        // Kiểm tra phản hồi
        $response->assertRedirect('/home'); // Chuyển hướng về trang chính sau khi đăng nhập thành công
        $this->assertAuthenticatedAs($user); // Kiểm tra rằng tài khoản đã được xác thực
    }
    public function testLoginWithoutEmail()
    {
    // Tạo một user mới sử dụng factory
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('password'),
    ]);

    // Gửi yêu cầu đăng nhập với email trống
    $response = $this->post('/login', [
        'email' => '',
        'password' => 'password',
    ]);

    // Kiểm tra phản hồi
    $response->assertSessionHasErrors('email');
    $this->assertGuest();
    }
    public function testLoginWithoutPassword()
{
    // Tạo một user mới sử dụng factory
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('password'),
    ]);

    // Gửi yêu cầu đăng nhập với mật khẩu trống
    $response = $this->post('/login', [
        'email' => 'test@example.com',
        'password' => '',
    ]);

    // Kiểm tra phản hồi
    $response->assertSessionHasErrors('password');
    $this->assertGuest();
}
public function testLoginWithIncorrectPassword()
{
    // Tạo một user mới sử dụng factory
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('password'),
    ]);

    // Gửi yêu cầu đăng nhập với mật khẩu sai
    $response = $this->post('/login', [
        'email' => 'test@example.com',
        'password' => 'wrongpassword',
    ]);

    // Kiểm tra phản hồi
    $response->assertSessionHasErrors('email');
    $this->assertGuest();
}
public function testLoginWithIncorrectEmail()
{
    // Tạo một user mới sử dụng factory
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('password'),
    ]);

    // Gửi yêu cầu đăng nhập với email không chính xác
    $response = $this->post('/login', [
        'email' => 'wrong@example.com',
        'password' => 'password',
    ]);

    // Kiểm tra phản hồi
    $response->assertSessionHasErrors('email');
    $this->assertGuest();
}
public function testLoginWithIncorrectCredentials()
{
    // Tạo một user mới sử dụng factory
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('password'),
    ]);

    // Gửi yêu cầu đăng nhập với email và mật khẩu không chính xác
    $response = $this->post('/login', [
        'email' => 'wrong@example.com',
        'password' => 'wrongpassword',
    ]);

    // Kiểm tra phản hồi
    $response->assertSessionHasErrors('email');
    $this->assertGuest();
}


}
