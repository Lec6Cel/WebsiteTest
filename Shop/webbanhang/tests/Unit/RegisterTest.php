<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;

class RegisterTest extends TestCase
{
    use DatabaseTransactions;

    public function testRegisterFormDisplaysCorrectFields()
    {
        $response = $this->get('/register');

        $response->assertStatus(200)
            ->assertSee('name')
            ->assertSee('email')
            ->assertSee('password')
            ->assertSee('password_confirmation');
    }
    public function testUserCanRegisterSuccessfully()
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $response = $this->post('/register', $userData);

        $response->assertRedirect('/home'); // Điều chỉnh đường dẫn này dựa trên đường dẫn redirect của bạn
        $this->assertDatabaseHas('users', ['email' => 'john@example.com']);
    }
    public function testUserCannotRegisterWithInvalidEmail()
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'invalid-email', // Địa chỉ email không hợp lệ
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $response = $this->post('/register', $userData);

        $response->assertSessionHasErrors('email');
        $this->assertDatabaseMissing('users', ['email' => 'invalid-email']);
    }
    public function testValidNameEmailAndPasswordFormat()
{
    // Tạo một mẫu họ và tên, email, và mật khẩu hợp lệ
    $validName = 'John Doe';
    $validEmail = 'john.doe@example.com';
    $validPassword = 'ValidPassword123';

    // Gửi yêu cầu đăng ký với các thông tin hợp lệ
    $response = $this->post('/register', [
        'name' => $validName,
        'email' => $validEmail,
        'password' => $validPassword,
        'password_confirmation' => $validPassword,
    ]);

    // Kiểm tra phản hồi
    $response->assertRedirect('/home');

    // Kiểm tra xem người dùng đã được đăng nhập thành công chưa
    $this->assertAuthenticated();
}

// public function testInvalidNameFormat()
// {
//     // Họ tên không hợp lệ (chứa ký tự đặc biệt)
//     $invalidData = [
//         'name' => 'John@Doe',
//         'email' => 'john.doe@example.com',
//         'password' => 'ValidPassword123',
//         'password_confirmation' => 'ValidPassword123',
//     ];

//     // Gửi yêu cầu đăng ký với họ tên không hợp lệ
//     $response = $this->post('/register', $invalidData);

//     // Kiểm tra phản hồi
//     $response->assertSessionHasErrors('name');
//     $this->assertGuest();
// }

public function testInvalidEmailFormat()
{
    // Email không hợp lệ (không có ký tự @)
    $invalidData = [
        'name' => 'John Doe',
        'email' => 'invalidemail.com',
        'password' => 'ValidPassword123',
        'password_confirmation' => 'ValidPassword123',
    ];

    // Gửi yêu cầu đăng ký với email không hợp lệ
    $response = $this->post('/register', $invalidData);

    // Kiểm tra phản hồi
    $response->assertSessionHasErrors('email');
    $this->assertGuest();
}

public function testInvalidPasswordFormat()
{
    // Mật khẩu không hợp lệ (ít nhất 6 ký tự)
    $invalidData = [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'password' => 'short',
        'password_confirmation' => 'short',
    ];

    // Gửi yêu cầu đăng ký với mật khẩu không hợp lệ
    $response = $this->post('/register', $invalidData);

    // Kiểm tra phản hồi
    $response->assertSessionHasErrors('password');
    $this->assertGuest();
}

public function testRegistrationWithDifferentData()
{
    // Không nhập họ tên
    $userDataWithoutName = [
        'name' => '',
        'email' => 'john.doe@example.com',
        'password' => 'ValidPassword123',
        'password_confirmation' => 'ValidPassword123',
    ];

    $response = $this->post('/register', $userDataWithoutName);
    $response->assertSessionHasErrors('name');

    // Nhập đúng định dạng email
    $userDataValidEmail = [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'password' => 'ValidPassword123',
        'password_confirmation' => 'ValidPassword123',
    ];

    $response = $this->post('/register', $userDataValidEmail);
    $response->assertRedirect('/home');

    // Nhập đúng định dạng mật khẩu
    $userDataValidPassword = [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'password' => 'ValidPassword123',
        'password_confirmation' => 'ValidPassword123',
    ];

    $response = $this->post('/register', $userDataValidPassword);
    $response->assertRedirect('/home');

    $this->assertAuthenticated();
}
public function testRegistrationWithDifferentDataFormats()
{
    // Nhập sai định dạng họ tên
    $userDataInvalidName = [
        'name' => 'John@Doe',
        'email' => 'john.doe@example.com',
        'password' => 'ValidPassword123',
        'password_confirmation' => 'ValidPassword123',
    ];

    $response = $this->post('/register', $userDataInvalidName);
    $response->assertSessionHasErrors('name');

    // Nhập đúng định dạng email
    $userDataValidEmail = [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'password' => 'ValidPassword123',
        'password_confirmation' => 'ValidPassword123',
    ];

    $response = $this->post('/register', $userDataValidEmail);
    $response->assertRedirect('/home');

    // Nhập đúng định dạng mật khẩu
    $userDataValidPassword = [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'password' => 'ValidPassword123',
        'password_confirmation' => 'ValidPassword123',
    ];

    $response = $this->post('/register', $userDataValidPassword);
    $response->assertRedirect('/home');

    $this->assertAuthenticated();
}

}