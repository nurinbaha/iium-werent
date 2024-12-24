<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReportedItem;
use App\Models\Item;

class AdminReportController extends Controller
{
    // List all reported items
    public function index()
    {
        $reportedItems = ReportedItem::with('item')->get(); // Eager load items
        return view('admin.reports', compact('reportedItems'));
    }

    // Show specific reported item details
    public function show($item_id)
    {
        $item = Item::findOrFail($item_id);
        return view('admin.admin-item-details', compact('item'));
    }

    // Delete a reported item
    public function delete($item_id)
    {
        $item = Item::findOrFail($item_id);

        // Delete the item and related reports
        $item->delete();
        ReportedItem::where('item_id', $item_id)->delete();

        return redirect()->route('admin.reports')->with('success', 'Item deleted successfully.');
    }

}
