@extends('admin.layout.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Cài Đặt Admin</h2>
        <form>
            <!-- Section: Thông Tin Tài Khoản -->
            <div class="card mb-4">
                <div class="card-header">Thông Tin Tài Khoản</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="username" class="form-label">Tên đăng nhập</label>
                        <input type="text" class="form-control" id="username" placeholder="Tên đăng nhập của bạn">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="name@example.com">
                    </div>
                </div>
            </div>

            <!-- Section: Bảo Mật -->
            <div class="card mb-4">
                <div class="card-header">Bảo Mật</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="currentPassword" class="form-label">Mật khẩu hiện tại</label>
                        <input type="password" class="form-control" id="currentPassword">
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">Mật khẩu mới</label>
                        <input type="password" class="form-control" id="newPassword">
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Xác nhận mật khẩu</label>
                        <input type="password" class="form-control" id="confirmPassword">
                    </div>
                </div>
            </div>

            <!-- Section: Cài Đặt Chung -->
            <div class="card mb-4">
                <div class="card-header">Cài Đặt Chung</div>
                <div class="card-body">
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="darkModeSwitch">
                        <label class="form-check-label" for="darkModeSwitch">Chế độ tối</label>
                    </div>
                    <div class="mb-3">
                        <label for="languageSelect" class="form-label">Ngôn ngữ</label>
                        <select class="form-select" id="languageSelect">
                            <option value="vi">Tiếng Việt</option>
                            <option value="en">English</option>
                            <!-- Thêm các ngôn ngữ khác -->
                        </select>
                    </div>
                </div>
            </div>

            <!-- Section: Phân Quyền -->
            <div class="card mb-4">
                <div class="card-header">Phân Quyền</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="roleSelect" class="form-label">Chọn vai trò</label>
                        <select class="form-select" id="roleSelect">
                            <option value="admin">Quản trị viên</option>
                            <option value="editor">Biên tập viên</option>
                            <option value="viewer">Người xem</option>
                            <!-- Thêm các quyền khác nếu cần -->
                        </select>
                    </div>
                    <div>
                        <h6>Thiết lập quyền:</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="permission1">
                            <label class="form-check-label" for="permission1">
                                Quản lý người dùng
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="permission2">
                            <label class="form-check-label" for="permission2">
                                Quản lý nội dung
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="permission3">
                            <label class="form-check-label" for="permission3">
                                Kiểm duyệt bình luận
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Nút lưu thay đổi -->
            <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
        </form>
    </div>
@endsection
