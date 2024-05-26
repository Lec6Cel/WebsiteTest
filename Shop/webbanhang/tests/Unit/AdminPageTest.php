<?php

use Facebook\WebDriver\Remote\DesiredCapabilities;
use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;

class AdminPageTest extends TestCase
{
    protected $webDriver;

    protected function setUp(): void
    {
        // Khởi tạo trình duyệt
        $this->webDriver = RemoteWebDriver::create('http://localhost:4444/wd/hub', DesiredCapabilities::chrome());
    }

    public function testDisplayedMembers()
    {
        // Truy cập trang quản trị
        $this->webDriver->get('http://127.0.0.1:8000/home');

        // Lấy số lượng thành viên từ bảng
        $members = $this->webDriver->findElements(WebDriverBy::xpath("//tbody/tr"));

        // Kiểm tra số lượng thành viên hiển thị
        $this->assertCount(4, $members, "Số lượng thành viên hiển thị không chính xác");
    }

    public function testMemberInformation()
    {
        // Truy cập trang quản trị
        $this->webDriver->get('http://127.0.0.1:8000/home');

        // Xác định thông tin của từng thành viên
        $member_info = [
            "Lê Nguyễn Quốc Trung" => ["role" => "Nhóm trưởng", "tasks" => "Test plan, test case", "MSSV" => "2151013103"],
            "Lê Huy Cường" => ["role" => "Coder chính, tester phụ", "tasks" => "Test case, test tự động", "MSSV" => "2151013011"],
            "Huỳnh Công Tín" => ["role" => "Người đặc tả", "tasks" => "Thực hiện test thủ công", "MSSV" => "2151013100"],
            "Việc chung" => ["role" => "Làm việc cùng nhau trên github", "tasks" => "Thực hiện báo cáo", "MSSV" => ""]
        ];

        // Lặp qua từng thành viên để kiểm tra thông tin
        foreach ($member_info as $member => $info) {
            $member_element = $this->webDriver->findElement(WebDriverBy::xpath("//td[contains(text(), '$member')]/.."));
            $role = $member_element->findElement(WebDriverBy::xpath("./td[2]"))->getText();
            $tasks = $member_element->findElement(WebDriverBy::xpath("./td[3]"))->getText();
            $mssv = $member_element->findElement(WebDriverBy::xpath("./td[4]"))->getText();

            // Kiểm tra thông tin với dữ liệu dự kiến
            $this->assertEquals($info["role"], $role, "Vai trò của $member không chính xác");
            $this->assertEquals($info["tasks"], $tasks, "Công việc của $member không chính xác");
            $this->assertEquals($info["MSSV"], $mssv, "MSSV của $member không chính xác");
        }
    }

    protected function tearDown(): void
    {
        // Đóng trình duyệt
        $this->webDriver->quit();
    }
}
