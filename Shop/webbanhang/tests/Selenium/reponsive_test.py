from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.service import Service
from webdriver_manager.chrome import ChromeDriverManager
import time

# Sử dụng webdriver-manager để tự động tải và cấu hình ChromeDriver
service = Service(ChromeDriverManager().install())
driver = webdriver.Chrome(service=service)

# URL của trang web Laravel
url = "http://127.0.0.1:8000"

# Mở trang web
driver.get(url)

# Đợi trang tải
time.sleep(3)

# Kiểm tra tính responsive bằng cách thay đổi kích thước cửa sổ
resolutions = [
    (1920, 1080),  # Desktop
    (1366, 768),   # Laptop
    (1024, 768),   # Tablet (Landscape)
    (768, 1024),   # Tablet (Portrait)
    (375, 667),    # Mobile (iPhone 6/7/8)
    (320, 568)     # Mobile (iPhone SE)
]

for width, height in resolutions:
    driver.set_window_size(width, height)
    time.sleep(2)  # Đợi một chút sau khi thay đổi kích thước cửa sổ
    print(f"Testing resolution: {width}x{height}")
    
    # Kiểm tra sự hiện diện của một phần tử cụ thể, ví dụ: '.navbar'
    try:
        assert driver.find_element(By.CSS_SELECTOR, '.navbar')
        print(f'Element found at resolution {width}x{height}')
    except AssertionError:
        print(f'Element not found at resolution {width}x{height}')

# Đóng trình duyệt
driver.quit()
