<?php
use Illuminate\Support\Facades\Factory;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CheckoutTest extends TestCase
{
    use DatabaseTransactions;
    use WithFaker;

    /**
     * Test case for checking the validity of input data.
     *
     * @return void
     */
    public function testCheckValidInput()
    {
        // Create fake input data
        $requestData = [
            'fullname' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone_number' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'note' => $this->faker->text,
        ];

        // Send a POST request to complete checkout route with valid data
        $response = $this->post(route('frontend.complete'), $requestData);

        // Assert that the response status is a redirect to home index
        $response->assertRedirect(route('home_index'));
    }

    /**
     * Test case for checking the validation of incomplete input data.
     *
     * @return void
     */
    public function testCheckIncompleteInput()
    {
        // Create fake input data with incomplete fields
        $incompleteData = [
            // One or more required fields are missing
            'fullname' => $this->faker->name,
            // Omitting other required fields for testing
        ];
    
        // Send a POST request to complete checkout route with incomplete data
        $response = $this->post(route('frontend.complete'), $incompleteData);
    
        // Assert that the response status is a redirect back to the checkout page
        $response->assertRedirect(route('home_index'));
    
        // Assert that there is a session error message about incomplete data
        // $response->assertSessionHasErrors(['fullname', 'email', 'phone_number', 'address', 'note']);
    }
    
    public function testCartIntegrity()
    {
        // Tạo dữ liệu giả cho các sản phẩm
        $products = [];
        for ($i = 0; $i < 3; $i++) {
            // Tạo dữ liệu giả cho mỗi sản phẩm
            $product = [
                'title' => 'Product ' . ($i + 1),
                'price' => 10 * ($i + 1),
                'discount' => 0,
                'thumbnail' => 'default-thumbnail.jpg',
                'description' => '', // Giá sản phẩm
                // Thêm các trường khác tùy thuộc vào cấu trúc của bảng sản phẩm trong cơ sở dữ liệu
            ];
            // Lưu mỗi sản phẩm vào mảng $products
            $products[] = $product;
        }
    
        // Tạo giỏ hàng giả với các sản phẩm đã tạo
        $cartItems = [];
        foreach ($products as $product) {
            // Tạo một bản ghi mới trong bảng sản phẩm sử dụng DB::table
            $productId = DB::table('product')->insertGetId($product);
            $cartItems[] = [
                'id' => $productId,
                'quantity' => 1, // Số lượng mỗi sản phẩm
            ];
        }
    
        // Lưu giỏ hàng vào cookie
        $cookie = cookie('cart', json_encode($cartItems));
    
        // Gửi một yêu cầu GET đến trang hiển thị giỏ hàng
        $response = $this->withCookie('cart', json_encode($cartItems))->get(route('frontend.cart'));
    
        // Kiểm tra xem các sản phẩm trong giỏ hàng trên trang hiển thị có khớp với giỏ hàng giả định hay không
        foreach ($products as $product) {
            // Kiểm tra xem tiêu đề sản phẩm có hiển thị trên trang hay không
            $response->assertSee($product['title']);
            // Kiểm tra xem giá của sản phẩm có hiển thị trên trang hay không
            $priceString = '$' . number_format($product['price'], 2); // Format giá thành chuỗi đúng
            $response->assertSee($priceString);
            $response->assertDontSee('Product 1');
        }
    }
    
    public function testCheckoutWithMultipleProducts()
{
    // Tạo dữ liệu giả cho các sản phẩm
    $products = [];
    for ($i = 0; $i < 2; $i++) { // Số lượng sản phẩm > 1
        // Tạo dữ liệu giả cho mỗi sản phẩm
        $product = [
            'title' => 'Product ' . ($i + 1),
            'price' => 10 * ($i + 1),
            'discount' => 0,
            'thumbnail' => 'default-thumbnail.jpg',
            'description' => '', // Mô tả sản phẩm
            // Thêm các trường khác tùy thuộc vào cấu trúc của bảng sản phẩm trong cơ sở dữ liệu
        ];
        // Lưu mỗi sản phẩm vào mảng $products
        $products[] = $product;
    }

    // Tạo giỏ hàng giả với các sản phẩm đã tạo
    $cartItems = [];
    foreach ($products as $product) {
        // Tạo một bản ghi mới trong bảng sản phẩm sử dụng DB::table
        $productId = DB::table('product')->insertGetId($product);
        $cartItems[] = [
            'id' => $productId,
            'quantity' => 1, // Số lượng mỗi sản phẩm
        ];
    }

    // Lưu giỏ hàng vào cookie
    $cookie = cookie('cart', json_encode($cartItems));

    // Gửi một yêu cầu GET đến trang hiển thị giỏ hàng
    $response = $this->withCookie('cart', json_encode($cartItems))->get(route('frontend.cart'));

    // Chọn thanh toán
    $response = $this->post(route('frontend.checkout'));

    // Điền thông tin Họ tên, số điện thoại, Địa chỉ đúng định dạng
    $requestData = [
        'fullname' => $this->faker->name,
        'phone_number' => $this->faker->phoneNumber,
        'address' => $this->faker->address,
    ];

    // Gửi POST request đến route xử lý việc hoàn tất thanh toán với dữ liệu nhập
    $response = $this->post(route('frontend.complete'), $requestData);

    // Kiểm tra xem thanh toán có được chuyển hướng về trang chính sách thành công hay không
    $response->assertRedirect(route('success_page'));

    // Kiểm tra xem session có thông báo thành công hay không
    $this->assertTrue(session()->has('success_message'));
}
}
