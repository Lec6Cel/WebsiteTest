<?php

namespace tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test creating a new user.
     *
     * @return void
     */
    public function testCreateUser()
    {
        // Dữ liệu mẫu của người dùng mới
        $userData = [
            'name' => 'Cuong',
            'email' => 'lcee@example.com',
            'password' => 'password123',
        ];

        // Tạo người dùng mới
        $user = User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => Hash::make($userData['password']),
        ]);

        // Kiểm tra xem người dùng đã được tạo thành công trong cơ sở dữ liệu hay không
        $this->assertDatabaseHas('users', [
            'name' => $userData['name'],
            'email' => $userData['email'],
        ]);
    }
    public function testHidePasswordWhenQueryingUser()
    {
        // Dữ liệu mẫu của người dùng mới
        $userData = [
            'name' => 'Cuong',
            'email' => 'lcee@example.com',
            'password' => 'password123',
        ];

        // Tạo người dùng mới
        $user = User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => Hash::make($userData['password']),
        ]);

        // Truy vấn người dùng từ cơ sở dữ liệu
        $queriedUser = User::find($user->id);

        // Kiểm tra xem mật khẩu đã được ẩn hay không
        $this->assertArrayNotHasKey('password', $queriedUser->toArray());
    }
}
