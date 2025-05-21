<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cancel;

class CancelController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'reason' => 'required|string|max:255',
            'details' => 'nullable|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:4096',
        ]);
        $user_id = auth()->user()->id;
        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('cancels', 'public');
        }

        Cancel::create([
            'reason' => $request->input('reason'),
            'details' => $request->input('details'),
            'file_path' => $filePath,
            'user_id' => $user_id,
        ]);

        return response()->json(['message' => 'Отмена успешно сохранена.']);
   }
   public function markAsRead($id)
    {
        $cancel = Cancel::findOrFail($id);
        $cancel->is_read = true;
        $cancel->save();

        return response()->json(['success' => true]);
    }

}
