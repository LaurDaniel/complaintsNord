<?php

namespace App\Observers;

use App\Models\Complaint;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class ComplaintActionObserver
{
    public function created(Complaint $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Complaint'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        // Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Complaint $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Complaint'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        // Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(Complaint $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'Complaint'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        // Notification::send($users, new DataChangeEmailNotification($data));
    }
}
