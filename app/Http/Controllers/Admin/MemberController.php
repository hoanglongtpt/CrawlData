<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordMemberRequest;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Http\Requests\EditUserAdminRequet;
use App\Http\Requests\CreateUserAdminRequet;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $query = Member::query(true);
        if ($request->email) {
            $query->where('email', 'LIKE', "%" . $request->email . "%");
        }
        if ($request->name) {
            $query->where('name', 'LIKE', "%" . $request->name . "%");
        }
        $items = $query->paginate(10);
        return view('admin.member.index', compact('items'));
    }

    public function edit(Request $request)
    {
        try {
            $member = Member::findOrFail($request->id);
            return view('admin.member.edit', compact('member'));
        } catch (\Exception $e) {
            // Ghi log lỗi
            Log::error('Lỗi khi tìm kiếm người dùng: ' . $e->getMessage());
            // Có thể thêm thông báo lỗi cho người dùng nếu cần
            return redirect()->route('admin.member.index')->with('error', 'Người dùng không tồn tại.');
        }
    }

    public function update(EditUserAdminRequet $request)
    {
        try {
            $member = Member::findOrFail($request->id);

            $member->email = $request->email;
            $member->name = $request->name;
            $member->account_balance = $request->account_balance;
            $member->save();
            Alert::success('Thành công', 'Người dùng đã được cập nhật thành công!')->autoClose(2000);
            return redirect()->route('member.edit', $member->id)->with('success', 'Cập nhật người dùng thành công.');
        } catch (\Exception $e) {
            Log::error('Lỗi khi cập nhật người dùng: ' . $e->getMessage());
            Alert::error('Lỗi', 'Cập nhật thất bại!')->autoClose(2000);
            return redirect()->back()->with('error', 'Cập nhật người dùng không thành công.');
        }
    }

    public function store(CreateUserAdminRequet $request)
    {
        try {
            $member = new Member();
            $member->email = $request->email;
            $member->name = $request->name;
            $member->password = Hash::make($request->password);
            $member->save();

            Alert::success('Thành công', 'Người dùng đã được tạo thành công!')->autoClose(2000);
            return redirect()->route('member.index')->with('success', 'Tạo người dùng thành công.');
        } catch (\Exception $e) {
            Log::error('Lỗi khi tạo người dùng: ' . $e->getMessage());
            Alert::error('Lỗi', 'Người dùng đã được tạo thất bại!')->autoClose(2000);
            return redirect()->back()->with('error', 'Tạo người dùng không thành công.');
        }
    }


    public function show(Request $request)
    {
        try {
            $member = Member::findOrFail($request->id);
            return view('member.show', compact('member'));
        } catch (\Exception $e) {
            // Ghi log lỗi
            Log::error('Lỗi khi tìm kiếm người dùng: ' . $e->getMessage());
            // Có thể thêm thông báo lỗi cho người dùng nếu cần
            return redirect()->route('member.index')->with('error', 'Người dùng không tồn tại.');
        }
    }

    public function create()
    {
        return view('admin.member.create');
    }

    public function destroy($id)
    {
        try {
            $member = Member::findOrFail($id);

            $member->delete();
            Alert::success('Thành công', 'Xóa người dùng thành công!')->autoClose(2000);
            return redirect()->route('member.index')->with('success', 'Xóa người dùng thành công.');
        } catch (\Exception $e) {
            Log::error('Lỗi khi xóa người dùng: ' . $e->getMessage());
            Alert::error('Lỗi', 'Xóa người dùng thất bại!')->autoClose(2000);
            return redirect()->route('member.index')->with('error', 'Xóa người dùng không thành công.');
        }
    }

    public function changePassword(ChangePasswordMemberRequest $request)
    {
        try {
            $memberLoggedin = Auth::guard('member')->user();
            $emailMember = $memberLoggedin->email;

            $member = Member::where('email', $emailMember)->first();
            $member->password = Hash::make($request->new_password);

            $member->save();
            Alert::success(Constants::ALERT_SUCCESS, __('messages.change_password_success'))->autoClose(2000);
            return redirect()->route('profile', ['tab' => 'tab2']);
        } catch (\Exception $e) {
            Log::error('Lỗi khi thay đổi mật khẩu: ' . $e->getMessage());
            Alert::error(Constants::ALERT_FAILED, __('messages.change_password_failded'))->autoClose(2000);
            return redirect()->route('profile', ['tab' => 'tab2']);
        }
    }
}
