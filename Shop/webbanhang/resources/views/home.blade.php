@php
$title="Trang quản trị";
@endphp

@extends('layouts.master-admin')

@section('content')
<table class="table mb-0 table-hover align-middle text-nowrap">
    <thead>
        <tr>
            <th class="border-top-0">Thành viên</th>
            <th class="border-top-0">Vai trò</th>
            <th class="border-top-0">Công việc thực hiện</th>
            <th class="border-top-0">MSSV</th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <div class="d-flex align-items-center">
                    <div class="m-r-10"><a
                            class="btn btn-circle d-flex btn-info text-white">QT</a>
                    </div>
                    <div class="">
                        <h4 class="m-b-0 font-16">Lê Nguyễn Quốc Trung</h4>
                    </div>
                </div>
            </td>
            <td>Nhóm trưởng</td>
            <td>Test plan, test case</td>
            <td>
                <label class="badge bg-danger">2151013103</label>
            </td>
            </td>
        </tr>
        <tr>
            <td>
                <div class="d-flex align-items-center">
                    <div class="m-r-10"><a
                            class="btn btn-circle d-flex btn-orange text-white">HC</a>
                    </div>
                    <div class="">
                        <h4 class="m-b-0 font-16">Lê Huy Cường</h4>
                    </div>
                </div>
            </td>
            <td>Coder chính, tester phụ</td>
            <td>Test case, test tự động</td>
            <td>
                <label class="badge bg-info">2151013011</label>
            </td>
            </td>
        </tr>
        <tr>
            <td>
                <div class="d-flex align-items-center">
                    <div class="m-r-10"><a
                            class="btn btn-circle d-flex btn-success text-white">CT</a>
                    </div>
                    <div class="">
                        <h4 class="m-b-0 font-16">Huỳnh Công Tín</h4>
                    </div>
                </div>
            </td>
            <td>Người đặc tả</td>
            <td>Thực hiện test thủ công</td>
            <td>
                <label class="badge bg-success">2151013100</label>
            </td>
            </td>
        </tr>
        <tr>
            <td>
                <div class="d-flex align-items-center">
                    <div class="m-r-10"><a
                            class="btn btn-circle d-flex btn-purple text-white">VC</a>
                    </div>
                    <div class="">
                        <h4 class="m-b-0 font-16">Việc chung</h4>
                    </div>
                </div>
            </td>
            <td>Làm việc cùng nhau trên github</td>
            <td>Thực hiện báo cáo</td>
            <td>
                <label class="badge bg-purple"></label>
            </td>
            </td>
        </tr>
    </tbody>
</table>
@endsection
