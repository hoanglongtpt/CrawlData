<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageDowload;
use Illuminate\Http\Request;
use App\Constants\Constants;
use App\Http\Requests\PageDownloadRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Log;


class PagedowloadController extends Controller
{
    public function index(Request $request)
    {
        $query = PageDowload::query(true);
        if ($request->name) {
            $query->where('name',  'LIKE', "%" . $request->name . "%");
        }
        $items = $query->paginate(10);
        return view('admin.pagedowload.index', compact('items'));
    }

    public function edit(Request $request)
    {
        try {
            $item = PageDowload::findOrFail($request->id);
            return view('admin.pagedowload.edit', compact('item'));
        } catch (\Exception $e) {
            // Ghi log lỗi
            Log::error('Lỗi khi tìm kiếm pagedowload: ' . $e->getMessage());
            // Có thể thêm thông báo lỗi cho pagedowload nếu cần
            return redirect()->route('pagedowload.index')->with('error', 'pagedowload không tồn tại.');
        }
    }

    public function update(PageDownloadRequest $request)
    {
        try {
            $item = PageDowload::findOrFail($request->id);

            $item->type = $request->type;
            $item->name = $request->name;
            $item->amount = $request->amount;
            $item->link_login = $request->link_login;
            $item->save();
            Alert::success('Thành công', 'Người dùng đã được cập nhật thành công!')->autoClose(2000);
            return redirect()->route('pagedowload.edit', $item->id)->with('success', 'Cập nhật người dùng thành công.');
        } catch (\Exception $e) {
            Log::error('Lỗi khi cập nhật người dùng: ' . $e->getMessage());
            Alert::error('Lỗi', 'Cập nhật thất bại!')->autoClose(2000);
            return redirect()->back()->with('error', 'Cập nhật người dùng không thành công.');
        }
    }

    public function store(PageDownloadRequest $request)
    {
        try {
            $item = new PageDowload();
            $item->type = $request->type;
            $item->name = $request->name;
            $item->amount = $request->amount;
            $item->link_login = $request->link_login;
            $item->save();

            Alert::success('Thành công', 'PageDowload đã được tạo thành công!')->autoClose(2000);
            return redirect()->route('pagedowload.index')->with('success', 'Tạo PageDowload thành công.');
        } catch (\Exception $e) {
            Log::error('Lỗi khi tạo PageDowload: ' . $e->getMessage());
            Alert::error('Lỗi', 'PageDowload đã được tạo thất bại!')->autoClose(2000);
            return redirect()->back()->with('error', 'Tạo PageDowload không thành công.');
        }
    }


    public function show(Request $request)
    {
        try {
            $user = PageDowload::findOrFail($request->id);
            return view('admin.pagedowload.show', compact('user'));
        } catch (\Exception $e) {
            // Ghi log lỗi
            Log::error('Lỗi khi tìm kiếm người dùng: ' . $e->getMessage());
            // Có thể thêm thông báo lỗi cho người dùng nếu cần
            return redirect()->route('pagedowload.index')->with('error', 'Người dùng không tồn tại.');
        }
    }

    public function create()
    {
        return view('admin.pagedowload.create');
    }

    public function destroy($id)
    {
        try {
            $item = PageDowload::findOrFail($id);

            $item->delete();
            Alert::success('Thành công', 'Xóa PageDowload thành công!')->autoClose(2000);
            return redirect()->route('pagedowload.index')->with('success', 'Xóa PageDowload thành công.');
        } catch (\Exception $e) {
            Log::error('Lỗi khi xóa PageDowload: ' . $e->getMessage());
            Alert::error('Lỗi', 'Xóa PageDowload thất bại!')->autoClose(2000);
            return redirect()->route('pagedowload.index')->with('error', 'Xóa PageDowload không thành công.');
        }
    }
}
