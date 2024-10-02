<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageDowload;


class PageDowloadController extends Controller
{
    public function get_category (Request $request) {
        $query = PageDowload::query(true);
        $items = $query->all();
        return view('admin.adminUser.index',compact('items'));
    }
}
