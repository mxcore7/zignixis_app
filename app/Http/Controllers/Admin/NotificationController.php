<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::recent()->paginate(20);
        return view('admin.notifications.index', compact('notifications'));
    }

    public function markAllAsRead()
    {
        Notification::where('read', false)->update(['read' => true]);
        return redirect()->back()->with('success', 'Toutes les notifications ont été marquées comme lues.');
    }

    public function markAsRead(Notification $notification)
    {
        $notification->update(['read' => true]);
        
        if ($notification->url) {
            return redirect($notification->url);
        }
        
        return redirect()->back()->with('success', 'Notification marquée comme lue.');
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();
        return redirect()->back()->with('success', 'Notification supprimée.');
    }
}
