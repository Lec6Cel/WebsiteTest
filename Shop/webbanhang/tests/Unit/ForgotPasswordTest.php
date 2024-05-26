<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;
use App\Models\User;

class ForgotPasswordTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    // public function user_can_view_confirm_password_page()
    // {
    //     $user = User::factory()->create(); // Tạo một người dùng mới

    //     $response = $this->actingAs($user) // Đăng nhập người dùng
    //                      ->get(route('password.confirm'));
    
    //     $response->assertStatus(200);
    // }

    // /** @test */    
    // public function user_can_view_forgot_password_page()
    // {
    //     $response = $this->get(route('password.request'));

    //     $response->assertStatus(200);
    // }


    // /** @test */
    // public function user_can_view_reset_password_page()
    // {
    //     $token = 'valid-token'; // Thay thế bằng token hợp lệ

    //     $response = $this->get(route('password.reset', ['token' => $token]));

    //     $response->assertStatus(200);
    // }
    // public function user_can_request_reset_password_email()
    // {
    //     Notification::fake(); // Ảo hóa các thông báo

    //     $user = User::factory()->create(); // Tạo một người dùng mới

    //     $response = $this->post(route('password.email'), [
    //         'email' => $user->email,
    //     ]);

    //     $response->assertRedirect(); // Kiểm tra xem có chuyển hướng không

    //     $token = '';
    //     Notification::assertSentTo(
    //         $user,
    //         ResetPassword::class,
    //         function ($notification, $channels) use (&$token) {
    //             $token = $notification->token;
    //             return true;
    //         }
    //     );

    //     // Kiểm tra xem token đã được tạo ra hay không
    //     $this->assertNotEmpty($token);

    //     // Lấy URL đặt lại mật khẩu từ email
    //     $resetPasswordUrl = route('password.reset', ['token' => $token]);

    //     // Đăng xuất người dùng
    //     $this->post(route('logout'));

    //     // Kiểm tra xem người dùng có thể đặt lại mật khẩu không
    //     $response = $this->get($resetPasswordUrl);
    //     $response->assertStatus(200);

    //     // Đặt lại mật khẩu và đăng nhập lại
    //     $newPassword = 'newpassword';
    //     $response = $this->post(route('password.update'), [
    //         'token' => $token,
    //         'email' => $user->email,
    //         'password' => $newPassword,
    //         'password_confirmation' => $newPassword,
    //     ]);
    //     $response->assertRedirect(route('home'));

    //     // Đăng nhập lại với mật khẩu mới
    //     $response = $this->post(route('login'), [
    //         'email' => $user->email,
    //         'password' => $newPassword,
    //     ]);
    //     $response->assertRedirect(route('home'));
    // }
    // public function user_receives_error_for_invalid_email_format()
    // {
    //     Notification::fake(); // Ảo hóa các thông báo

    //     $user = User::factory()->create(); // Tạo một người dùng mới

    //     $response = $this->from(route('password.request'))
    //                      ->post(route('password.email'), [
    //                          'email' => 'invalidemailformat',
    //                      ]);

    //     $response->assertRedirect(route('password.request'))
    //              ->assertSessionHasErrors('email');
    // }
    // public function user_receives_error_for_empty_email()
    // {
    //     Notification::fake(); // Ảo hóa các thông báo

    //     $response = $this->from(route('password.request'))
    //                      ->post(route('password.email'), [
    //                          'email' => '',
    //                      ]);

    //     $response->assertRedirect(route('password.request'))
    //              ->assertSessionHasErrors('email');
    // }
    // public function user_receives_error_for_non_registered_email()
    // {
    //     Notification::fake(); // Ảo hóa các thông báo

    //     $response = $this->from(route('password.request'))
    //                      ->post(route('password.email'), [
    //                          'email' => 'nonregistered@example.com',
    //                      ]);

    //     $response->assertRedirect(route('password.request'))
    //              ->assertSessionHasErrors('email');
    // }
    // public function user_receives_error_for_empty_password()
    // {
    //     $user = User::factory()->create(); // Tạo một người dùng mới

    //     $token = Password::broker()->createToken($user);

    //     $response = $this->from(route('password.reset', ['token' => $token]))
    //                      ->post(route('password.update'), [
    //                          'token' => $token,
    //                          'email' => $user->email,
    //                          'password' => '',
    //                          'password_confirmation' => '',
    //                      ]);

    //     $response->assertRedirect(route('password.reset', ['token' => $token]))
    //              ->assertSessionHasErrors('password');
    // }
    // public function user_receives_error_for_invalid_password_format()
    // {
    //     $user = User::factory()->create(); // Tạo một người dùng mới

    //     $token = Password::broker()->createToken($user);

    //     $response = $this->from(route('password.reset', ['token' => $token]))
    //                      ->post(route('password.update'), [
    //                          'token' => $token,
    //                          'email' => $user->email,
    //                          'password' => 'short',
    //                          'password_confirmation' => 'short',
    //                      ]);

    //     $response->assertRedirect(route('password.reset', ['token' => $token]))
    //              ->assertSessionHasErrors('password');
    // }
    // public function user_receives_error_for_password_without_uppercase()
    // {
    //     $user = User::factory()->create(); // Tạo một người dùng mới

    //     $token = Password::broker()->createToken($user);

    //     $response = $this->from(route('password.reset', ['token' => $token]))
    //                      ->post(route('password.update'), [
    //                          'token' => $token,
    //                          'email' => $user->email,
    //                          'password' => 'lowercasepassword',
    //                          'password_confirmation' => 'lowercasepassword',
    //                      ]);

    //     // Kiểm tra xem liệu có hiển thị lỗi phù hợp hay không
    //     $response->assertRedirect(route('password.reset', ['token' => $token]))
    //              ->assertSessionHasErrors('password');
    // }
    // public function user_receives_error_for_password_without_lowercase()
    // {
    //     $user = User::factory()->create(); // Tạo một người dùng mới

    //     $token = Password::broker()->createToken($user);

    //     $response = $this->from(route('password.reset', ['token' => $token]))
    //                      ->post(route('password.update'), [
    //                          'token' => $token,
    //                          'email' => $user->email,
    //                          'password' => 'UPPERCASEPASSWORD',
    //                          'password_confirmation' => 'UPPERCASEPASSWORD',
    //                      ]);

    //     // Kiểm tra xem liệu có hiển thị thông báo lỗi phù hợp hay không
    //     $response->assertSessionHasErrors('password');
    // }
    // public function user_receives_error_for_password_without_digit()
    // {
    //     $user = User::factory()->create(); // Tạo một người dùng mới

    //     $token = Password::broker()->createToken($user);

    //     $response = $this->from(route('password.reset', ['token' => $token]))
    //                      ->post(route('password.update'), [
    //                          'token' => $token,
    //                          'email' => $user->email,
    //                          'password' => 'PasswordWithoutDigit',
    //                          'password_confirmation' => 'PasswordWithoutDigit',
    //                      ]);

    //     // Kiểm tra xem liệu có hiển thị lỗi trên trang hay không
    //     $response->assertStatus(302)
    //              ->assertSessionHasErrors('password');
    // }
    public function user_receives_error_for_password_too_long()
    {
        $user = User::factory()->create(); // Tạo một người dùng mới

        $token = Password::broker()->createToken($user);

        // Tạo một mật khẩu có độ dài hơn 100 ký tự
        $longPassword = str_repeat('a', 101);

        $response = $this->from(route('password.reset', ['token' => $token]))
                         ->post(route('password.update'), [
                             'token' => $token,
                             'email' => $user->email,
                             'password' => $longPassword,
                             'password_confirmation' => $longPassword,
                         ]);

        // Kiểm tra xem liệu có hiển thị thông báo lỗi phù hợp hay không
        $response->assertSessionHasErrors('password');
    }
}
