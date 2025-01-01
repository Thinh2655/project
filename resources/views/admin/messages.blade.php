@extends('admin.layout.app')

@section('title', 'Home Page')

@section('content')

    <style>
        body {
            background-color: #f8f9fa;
        }

        .table-hover tbody tr:hover {
            background-color: #e9ecef;
        }

        .btn-custom {
            background-color: #4e73df;
            border-color: #4e73df;
            color: #fff;
        }

        .btn-custom:hover {
            background-color: #2e59d9;
            border-color: #2653d4;
        }

        .table thead th {
            background-color: #4e73df;
            color: #fff;
            text-align: center;
        }

        .table tbody td {
            text-align: center;
        }

        .status-unread {
            color: #f6c23e;
            font-weight: bold;
        }

        .status-read {
            color: #1cc88a;
            font-weight: bold;
        }

        .status-important {
            color: #e74a3b;
            font-weight: bold;
        }

        .status-icon {
            margin-right: 5px;
        }
    </style>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Quản lý Tin nhắn</h1>

        <!-- Thông báo kết quả hành động -->
        <div class="alert alert-success text-center" role="alert" style="display: none;" id="actionAlert">
            Hành động đã thực hiện thành công!
        </div>

        <!-- Thanh tìm kiếm và lọc -->
        <div class="row mb-3">
            <div class="col-md-8">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm tin nhắn..."
                        aria-label="Tìm kiếm tin nhắn">
                    <button class="btn btn-custom" type="button">Tìm kiếm</button>
                </div>
            </div>
            <div class="col-md-4">
                <select class="form-select">
                    <option value="">Lọc theo tình trạng</option>
                    <option value="unread">Chưa đọc</option>
                    <option value="read">Đã đọc</option>
                    <option value="important">Quan trọng</option>
                </select>
            </div>
        </div>

        <!-- Bảng tin nhắn -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Người gửi</th>
                    <th>Email</th>
                    <th>Chủ đề</th>
                    <th>Nội dung</th>
                    <th>Thời gian gửi</th>
                    <th>Tình trạng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>vana@example.com</td>
                    <td>Hỗ trợ kỹ thuật</td>
                    <td>Nội dung tin nhắn đầu tiên dài hơn...</td>
                    <td>2023-10-12 08:53</td>
                    <td class="status-unread"><i class="fas fa-envelope status-icon"></i>Chưa đọc</td>
                    <td>
                        <button class="btn btn-sm btn-custom" onclick="viewMessage()">Xem</button>
                        <button class="btn btn-sm btn-danger" onclick="deleteMessage()">Xóa</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Trần Thị B</td>
                    <td>thaib@example.com</td>
                    <td>Góp ý tính năng</td>
                    <td>Nội dung tin nhắn thứ hai dài hơn...</td>
                    <td>2023-10-12 09:24</td>
                    <td class="status-read"><i class="fas fa-check status-icon"></i>Đã đọc</td>
                    <td>
                        <button class="btn btn-sm btn-custom" onclick="viewMessage()">Xem</button>
                        <button class="btn btn-sm btn-danger" onclick="deleteMessage()">Xóa</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Phân trang -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="#">Trước</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Tiếp</a></li>
            </ul>
        </nav>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function viewMessage() {
            alert('Xem chi tiết tin nhắn!');
        }

        function deleteMessage() {
            const actionAlert = document.getElementById('actionAlert');
            actionAlert.style.display = 'block';
        }
    </script>

@endsection
