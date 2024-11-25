<!DOCTYPE html>
<html>
<head>
    <title>{{ $details['subject'] }}</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>Họ và tên: {{ $details['fullname'] }}</p>
    <p>Giới tính: {{ ($details['gender'] == 1) ? 'Nam' : 'Nữ'}}</p>
    <p>Số điện thoại: {{ $details['phone'] }}</p>
    <p>Email: {{ $details['email'] }}</p>
    <p>Khóa học: {{ $details['courses'] }}</p>
    <p>Biết đến trang từ: {{ $details['traffic'] }}</p>
    <p>Chức vụ hiện tại: {{ $details['position'] }}</p>
    <p>Đơn vị công tác hiện tại: {{ $details['company'] }}</p>
    <p>Địa chỉ: {{ $details['experience'] }}</p>
    <p>ghi chú: {{ $details['note'] }}</p>
</body>
</html>
