<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CartTest extends TestCase
{
    use DatabaseTransactions; 

    /**
     * Kiểm tra hiển thị đúng dữ liệu sản phẩm trong giỏ hàng.
     *
     * @return void
     */
    public function testCartDisplaysCorrectProductData()
    {
        // Lấy ra một số sản phẩm từ cơ sở dữ liệu
        $products = \DB::table('product')->inRandomOrder()->take(3)->get();

        // Tạo dữ liệu giỏ hàng giả định
        $cart = [
            ['id' => $products[0]->id, 'num' => 2],
            ['id' => $products[1]->id, 'num' => 1],
            ['id' => $products[2]->id, 'num' => 3],
        ];
        $this->withCookie('cart', json_encode($cart));

        // Gửi yêu cầu GET đến trang giỏ hàng
        $response = $this->get(route('frontend.cart'));

        // Kiểm tra xem trang đã được tải thành công không
        $response->assertStatus(200);

        // Kiểm tra xem dữ liệu sản phẩm có hiển thị đúng không
        foreach ($cart as $item) {
            $response->assertSee($products->where('id', $item['id'])->first()->title);
            // Tiếp tục kiểm tra các chi tiết khác của sản phẩm
        }
    }
    public function testProductCanBeAddedToCart()
    {
        // Tạo dữ liệu giả lập cho sản phẩm
        $productData = [
            'name' => 'Acer Nitro',
            'price' => 1000, // Giá sản phẩm
            // Thêm các trường khác nếu cần
        ];

        // Tạo sản phẩm trong giỏ hàng
        $response = $this->post('/add-to-cart', $productData);

        // Kiểm tra xem sản phẩm đã được thêm vào giỏ hàng thành công chưa
        $response->assertStatus(200);

        // Tiếp tục với các bước kiểm tra của bạn
    }
}
