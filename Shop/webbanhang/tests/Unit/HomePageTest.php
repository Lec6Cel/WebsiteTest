<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_home_page_is_accessible()
    {
        // Gửi yêu cầu GET đến trang chủ
        $response = $this->get('/');

        // Kiểm tra phản hồi
        $response->assertStatus(200);
    }

    /** @test */
    public function test_home_page_displays_navigation_links()
    {
        // Gửi yêu cầu GET đến trang chủ
        $response = $this->get('/');

        // Kiểm tra xem trang chủ có chứa các liên kết điều hướng mong muốn hay không
        $response->assertSee('Home');
        $response->assertSee('About');
        $response->assertSee('Contact');
    }

    /** @test */
    public function test_home_page_has_header()
    {
        // Gửi yêu cầu GET đến trang chủ
        $response = $this->get('/');

        // Kiểm tra xem trang chủ có chứa phần tử header hay không
        $response->assertSee('<header', false); // Kiểm tra sự hiện diện của thẻ header
        $response->assertSee('</header>', false); // Kiểm tra sự kết thúc của thẻ header
    }

    /** @test */
    public function test_home_page_has_footer()
    {
        // Gửi yêu cầu GET đến trang chủ
        $response = $this->get('/');

        // Kiểm tra xem trang chủ có chứa phần tử footer hay không
        $response->assertSee('<footer', false); // Kiểm tra sự hiện diện của thẻ footer
        $response->assertSee('</footer>', false); // Kiểm tra sự kết thúc của thẻ footer
    }
}