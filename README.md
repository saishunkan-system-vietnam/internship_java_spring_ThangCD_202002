# internship_php_mvc_ThangCD_202002
	Thực tập PHP Core - Tạo chức năng CRUD đơn giản

## Môi trường phát triển
	Xampp PHP 7.3
	PHP Core + MVC
	DB MYSQL 8

## Nội dung

### Login	
	Nhập thông tin user/password để thực hiện đăng nhập
	Password mã hóa MD5

### Đăng ký nhân viên
	Cần validate các trường user_name là duy nhất, địa chỉ email phải hợp lệ, số điện thoại chỉ được nhập số

### Lấy lại mật khẩu	
	Tự động tạo mật khẩu mới rồi gửi mail thông tin mật khẩu

### Danh sách nhân viên	
	Hiển thị danh sách thông tin nhân viên: ID, Tên nhân viên, ngày tháng năm sinh, phòng ban làm việc, số điện thoại, email
	Ở danh sách có thể xóa, mở form thêm mới - form chi tiết user
	Có thể tìm kiếm nhân viên theo tên, tuổi, phòng ban, số điện thoại, email...
  
### Chi tiết user
	Hiển thị thông tin chi tiết của user
	Ở form chi tiết có thể sửa các thông tin của user.
  
## Mô tả database

### Bảng phòng ban
	ID (id tự tăng)
	ID phòng ban cha
	Tên phòng ban
  
### Nhân viên
	ID (id tự tăng)
	ID phòng ban
	User name
	Password
	Họ tên
	Ngày tháng năm sinh
	Số điện thoại
	Email

## Link tham khảo
	https://viblo.asia/p/cai-dat-ung-dung-php-thuan-su-dung-mvc-va-oop-4P856aA3lY3
	https://freetuts.net/hoc-php/hoc-mvc-php-nang-cao
