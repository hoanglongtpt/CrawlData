<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Constants;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\EditUserAdminRequet;
use App\Http\Requests\CreateUserAdminRequet;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query(true);
        if ($request->email) {
            $query->where('email',  'LIKE', "%" . $request->email . "%");
        }
        if ($request->name) {
            $query->where('name',  'LIKE', "%" . $request->name . "%");
        }
        $items = $query->paginate(10);
        return view('admin.user.index', compact('items'));
    }

    public function edit(Request $request)
    {
        try {
            $user = User::findOrFail($request->id);
            return view('admin.user.edit', compact('user'));
        } catch (\Exception $e) {
            // Ghi log lỗi
            Log::error('Lỗi khi tìm kiếm người dùng: ' . $e->getMessage());
            // Có thể thêm thông báo lỗi cho người dùng nếu cần
            return redirect()->route('user.index')->with('error', 'Người dùng không tồn tại.');
        }
    }

    public function update(Request $request)
    {
        try {
            $user = User::findOrFail($request->id);

            $user->email = $request->email;
            $user->name = $request->name;
            $user->type = Constants::ADMIN_USER_TYPE;
            $user->save();
            Alert::success('Thành công', 'Người dùng đã được cập nhật thành công!')->autoClose(2000);
            return redirect()->route('user.edit', $user->id)->with('success', 'Cập nhật người dùng thành công.');
        } catch (\Exception $e) {
            Log::error('Lỗi khi cập nhật người dùng: ' . $e->getMessage());
            Alert::error('Lỗi', 'Cập nhật thất bại!')->autoClose(2000);
            return redirect()->back()->with('error', 'Cập nhật người dùng không thành công.');
        }
    }

    public function store(CreateUserAdminRequet $request)
    {
        try {
            $user = new User();
            $user->email = $request->email;
            $user->name = $request->name;
            $user->type = Constants::ADMIN_USER_TYPE;
            $user->password = Hash::make($request->password);
            $user->save();

            Alert::success('Thành công', 'Người dùng đã được tạo thành công!')->autoClose(2000);
            return redirect()->route('user.index')->with('success', 'Tạo người dùng thành công.');
        } catch (\Exception $e) {
            Log::error('Lỗi khi tạo người dùng: ' . $e->getMessage());
            Alert::error('Lỗi', 'Người dùng đã được tạo thất bại!')->autoClose(2000);
            return redirect()->back()->with('error', 'Tạo người dùng không thành công.');
        }
    }


    public function show(Request $request)
    {
        try {
            $user = User::findOrFail($request->id);
            return view('admin.user.show', compact('user'));
        } catch (\Exception $e) {
            // Ghi log lỗi
            Log::error('Lỗi khi tìm kiếm người dùng: ' . $e->getMessage());
            // Có thể thêm thông báo lỗi cho người dùng nếu cần
            return redirect()->route('user.index')->with('error', 'Người dùng không tồn tại.');
        }
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);

            $user->delete();
            Alert::success('Thành công', 'Xóa người dùng thành công!')->autoClose(2000);
            return redirect()->route('user.index')->with('success', 'Xóa người dùng thành công.');
        } catch (\Exception $e) {
            Log::error('Lỗi khi xóa người dùng: ' . $e->getMessage());
            Alert::error('Lỗi', 'Xóa người dùng thất bại!')->autoClose(2000);
            return redirect()->route('user.index')->with('error', 'Xóa người dùng không thành công.');
        }
    }
}
