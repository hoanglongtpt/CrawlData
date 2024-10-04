<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    // Get all transaction
    public function index(Request $request)
    {
        $email = $request->email;
        $name = $request->name;
        $status = $request->status;
        $pageName =  $request->pageName;
        $transactionDate = $request->transactionDate;

        $query = Transaction::with(['pageDowload', 'member']);
        // filter by member email
        if ($email) {
            $query->whereHas('member', function ($query) use ($email) {
                $query->where('email', 'LIKE', '%' . $email . '%');
            });
        }

        // filter by member name
        if ($name) {
            $query->whereHas('member', function ($query) use ($name) {
                $query->where('name', 'LIKE', '%' . $name . '%');
            });
        }

        // filter by page dowload
        if ($pageName) {
            $query->whereHas('pageDowload', function ($query) use ($pageName) {
                $query->where('name', 'LIKE', '%' . $pageName . '%');
            });
        }

        // filter by status transaction
        if ($status) {
            $query->where('status', $status);
        }

        // filter by created date transaction
        if ($transactionDate) {
            $query->whereDate('created_at', $transactionDate);
        }

        $transactionList = $query->paginate(10);
        return view('admin.transaction.index', compact('transactionList'));
    }

    // Hiển thị form tạo giao dịch mới
    public function create()
    {
        //TODO
        return view('transactions.create');
    }

    // Lưu giao dịch mới
    public function store(Request $request)
    {
        //TODO
        // $request->validate([
        //     'amount' => 'required|numeric',
        //     'description' => 'required|string',
        // ]);

        // Transaction::create($request->all());

        return redirect()->route('transactions.index')->with('success', 'Giao dịch đã được tạo!');
    }

    // Hiển thị chi tiết một giao dịch
    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('transactions.show', compact('transaction'));
    }

    // Hiển thị form chỉnh sửa giao dịch
    public function edit($id)
    {
        //TODO
        // $transaction = Transaction::findOrFail($id);
        return view('transactions.edit', compact('transaction'));
    }

    // Cập nhật giao dịch
    public function update(Request $request, $id)
    {
        //TODO
        // $request->validate([
        //     'amount' => 'required|numeric',
        //     'description' => 'required|string',
        // ]);

        // $transaction = Transaction::findOrFail($id);
        // $transaction->update($request->all());

        return redirect()->route('transactions.index')->with('success', 'Giao dịch đã được cập nhật!');
    }

    // Xóa giao dịch
    public function destroy($id)
    {
        //TODO
        // $transaction = Transaction::findOrFail($id);
        // $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Giao dịch đã được xóa!');
    }
}
