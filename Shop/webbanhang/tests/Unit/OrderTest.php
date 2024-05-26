<?php

namespace tests\Unit;

use App\Models\Orders;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test creating a new order.
     *
     * @return void
     */
    public function testCreateOrder()
    {
        $user = User::factory()->create();
        // Dữ liệu mẫu của đơn hàng mới
        $orderData = [
            'user_id' => $user->id, // Sử dụng id của user mới tạo
            'fullname' => 'John Doe',
            'email' => 'john@example.com',
            'phone_number' => '123456789',
            'address' => '123 Main Street',
            'note' => 'Test order',
            'order_date' => now(),
            'status' => 'pending',
            'total_money' => 100,
        ];

        // Tạo đơn hàng mới
        $order = Orders::create($orderData);

        // Kiểm tra xem đơn hàng đã được tạo thành công trong cơ sở dữ liệu hay không
        $this->assertDatabaseHas('orders', [
            'user_id' => $orderData['user_id'],
            'fullname' => $orderData['fullname'],
            'email' => $orderData['email'],
            'phone_number' => $orderData['phone_number'],
            'address' => $orderData['address'],
            'note' => $orderData['note'],
            'order_date' => $orderData['order_date'],
            'status' => $orderData['status'],
            'total_money' => $orderData['total_money'],
        ]);
    }
}
