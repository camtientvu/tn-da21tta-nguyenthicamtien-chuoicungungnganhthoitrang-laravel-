<?php

namespace App\Http\Controllers\CongTy\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\KhachHang;
use App\Models\NhanVienCongTy;
use App\Models\NhanVienNhaCungCap;
use App\Models\NhanVienGiaoHang;
use App\Models\NhaCungCap;
use App\Models\CongTyGiaoHang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Danh sách người dùng
    public function index()
    {
        $users = User::with([
            'nhanVienCongTy',
            'nhanVienGiaoHang.congTyGiaoHang',
            'nhanVienNhaCungCap.nhaCungCap'
        ])->orderBy('id', 'desc')->get();

        return view('congty.user.index', [
            'title' => 'Danh sách người dùng',
            'users' => $users
        ]);
    }


    // Hiển thị form thêm người dùng
    public function create()
    {
        $nhaCungCaps = NhaCungCap::all();
        $congTyGiaoHangs = CongTyGiaoHang::all();
        return view('congty.user.create', compact('nhaCungCaps', 'congTyGiaoHangs'));
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'ten' => [
                    'required',
                    'string',
                    'max:255',
                    'regex:/^[a-z0-9_]+$/', // không có khoảng trắng, chỉ chữ thường, số, _
                    'unique:users,ten',
                ],
                'email' => 'required|email|unique:users,email',
                'mat_khau' => 'required|min:6|confirmed',
                'so_dien_thoai' => [
                    'nullable',
                    'regex:/^0\d{9,10}$/'
                ],
                'cccd' => [
                    'nullable',
                    'regex:/^\d{12}$/'
                ],
                'loai_nguoi_dung' => 'required|in:khach_hang,nhan_vien_cong_ty,nhan_vien_nha_cung_cap,nhan_vien_giao_hang',
            ], [
                'ten.required' => 'Tên đăng nhập là bắt buộc.',
                'ten.regex' => 'Tên đăng nhập chỉ bao gồm chữ thường, số và dấu gạch dưới, không có khoảng trắng.',
                'ten.unique' => 'Tên đăng nhập đã tồn tại.',
                'email.required' => 'Email là bắt buộc.',
                'email.email' => 'Email không hợp lệ.',
                'email.unique' => 'Email đã được sử dụng.',
                'mat_khau.required' => 'Mật khẩu là bắt buộc.',
                'mat_khau.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
                'mat_khau.confirmed' => 'Xác nhận mật khẩu không khớp.',
                'so_dien_thoai.regex' => 'Số điện thoại không hợp lệ (phải bắt đầu bằng 0 và có 10-11 số).',
                'loai_nguoi_dung.required' => 'Vui lòng chọn loại người dùng.',
                'loai_nguoi_dung.in' => 'Loại người dùng không hợp lệ.',
                'cccd.regex' => 'Căn cước công dân (phải có 12 số).',
            ]);



            $user = User::create([
                'ten' => $request->ten,
                'ho_ten' => $request->ho_ten,
                'cccd' => $request->cccd,
                'email' => $request->email,
                'mat_khau' => Hash::make($request->mat_khau),
                'so_dien_thoai' => $request->so_dien_thoai,
                'dia_chi' => $request->dia_chi,
                'loai_nguoi_dung' => $request->loai_nguoi_dung,
            ]);

            // Tạo bản ghi phụ tùy theo loại người dùng
            switch ($request->loai_nguoi_dung) {
                case 'khach_hang':
                    KhachHang::create([
                        'id_nguoi_dung' => $user->id,
                        // thêm các trường khác nếu cần
                    ]);
                    break;

                case 'nhan_vien_cong_ty':
                    NhanVienCongTy::create([
                        'id_nguoi_dung' => $user->id,
                        // thêm các trường khác nếu cần
                    ]);
                    break;

                case 'nhan_vien_nha_cung_cap':
                    NhanVienNhaCungCap::create([
                        'id_nguoi_dung' => $user->id,
                        'id_nha_cung_cap' => $request->id_nha_cung_cap,
                        'vai_tro' => 'thuc_thi',
                        // thêm các trường khác nếu cần
                    ]);
                    break;

                case 'nhan_vien_giao_hang':
                    NhanVienGiaoHang::create([
                        'id_nguoi_dung' => $user->id,
                        'id_cong_ty_giao_hang' => $request->id_cong_ty_giao_hang,
                        'vai_tro' => 'thuc_thi',
                    ]);
                    break;
            }

            return redirect()->route('congty.user.index')->with('success', 'Thêm người dùng thành công!');
        } catch (\Exception $e) {
            Log::error('Lỗi khi thêm người dùng: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    // Hiển thị form sửa
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $nhaCungCaps = NhaCungCap::all();
        $congTyGiaoHangs = CongTyGiaoHang::all();
        return view('congty.user.edit', compact('user', 'nhaCungCaps', 'congTyGiaoHangs'));
    }


    // Cập nhật người dùng
    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $request->validate([
                'ten' => [
                    'required',
                    'string',
                    'max:255',
                    'regex:/^[a-z0-9_]+$/',
                    Rule::unique('users', 'ten')->ignore($user->id),
                ],
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users', 'email')->ignore($user->id),
                ],
                'so_dien_thoai' => [
                    'nullable',
                    'regex:/^0\d{9,10}$/'
                ],
                'cccd' => [
                    'nullable',
                    'regex:/^\d{12}$/'
                ],
            ], [
                'ten.required' => 'Tên đăng nhập là bắt buộc',
                'ten.regex' => 'Tên đăng nhập không được chứa khoảng trắng, viết hoa hoặc ký tự đặc biệt',
                'ten.unique' => 'Tên đăng nhập đã tồn tại',
                'email.required' => 'Email là bắt buộc',
                'email.email' => 'Email không đúng định dạng',
                'email.unique' => 'Email đã tồn tại',
                'so_dien_thoai.regex' => 'Số điện thoại không hợp lệ. Phải bắt đầu bằng 0 và có 10–11 chữ số',
                'cccd.regex' => 'Căn cước công dân (phải có 12 số).',
            ]);

            $data = [
                'ten' => $request->ten,
                'cccd' => $request->cccd,
                'ho_ten' => $request->ho_ten,
                'email' => $request->email,
                'so_dien_thoai' => $request->so_dien_thoai,
                'dia_chi' => $request->dia_chi,
            ];

            if ($request->filled('mat_khau')) {
                $request->validate([
                    'mat_khau' => 'min:6|confirmed',
                ], [
                    'mat_khau.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
                    'mat_khau.confirmed' => 'Xác nhận mật khẩu không đúng',
                ]);

                $data['mat_khau'] = Hash::make($request->mat_khau);
            }

            $user->update($data);

            return redirect()->route('congty.user.index')->with('success', 'Cập nhật người dùng thành công!');
        } catch (\Exception $e) {
            Log::error('Lỗi khi sửa người dùng: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }


    // Xóa người dùng
    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->delete();

        return redirect()->route('congty.user.index')->with('success', 'Xóa người dùng thành công!');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $chiTiet = null;

        switch ($user->loai_nguoi_dung) {
            case 'nhan_vien_cong_ty':
                $chiTiet = NhanVienCongTy::where('id_nguoi_dung', $user->id)->first();
                break;
            case 'nhan_vien_nha_cung_cap':
                $chiTiet = NhanVienNhaCungCap::with('nhaCungCap')->where('id_nguoi_dung', $user->id)->first();
                break;
            case 'nhan_vien_giao_hang':
                $chiTiet = NhanVienGiaoHang::with('congTyGiaoHang')->where('id_nguoi_dung', $user->id)->first();
                break;
            case 'khach_hang':
                $chiTiet = KhachHang::where('id_nguoi_dung', $user->id)->first();
                break;
        }

        return view('congty.user.show', compact('user', 'chiTiet'));
    }

    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user1 = Auth::user();
        if ($user1->nhanVienCongTy->vai_tro !== 'admin') {
            abort(403, 'Chỉ admin mới được chỉnh sửa.');
        }

        // Không cho phép admin sửa vai trò của chính mình
        if ($user1->id == $id) {
            return back()->with('error', 'Bạn không thể sửa vai trò của chính mình.');
        }

        switch ($user->loai_nguoi_dung) {
            case 'nhan_vien_cong_ty':
                $nvct = NhanVienCongTy::where('id_nguoi_dung', $user->id)->firstOrFail();
                $nvct->update(['vai_tro' => $request->vai_tro]);
                break;

            case 'nhan_vien_nha_cung_cap':
                $nvncc = NhanVienNhaCungCap::where('id_nguoi_dung', $user->id)->firstOrFail();
                $nvncc->update(['vai_tro' => $request->vai_tro]);
                break;

            case 'nhan_vien_giao_hang':
                $nvg = NhanVienGiaoHang::where('id_nguoi_dung', $user->id)->firstOrFail();
                $nvg->update(['vai_tro' => $request->vai_tro]);
                break;

            default:
                return back()->with('error', 'Không thể cập nhật quyền cho loại người dùng này.');
        }

        return back()->with('success', 'Cập nhật vai trò thành công!');
    }
}
