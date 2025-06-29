<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rule;
use App\Models\User;
use App\Models\Latihan;
use App\Models\Rekomendasi;



class DashboardController extends Controller
{

    public function index()
    {
        // Data role user
        $totalAdmin = User::where('role_id', 1)->count();   // Admin
        $totalTrainer = User::where('role_id', 2)->count(); // Trainer
        $totalMember = User::where('role_id', 3)->count();  // Member
    
        // Data lain (opsional, sesuaikan kebutuhan)
        $totalLatihan = Latihan::count();
        $totalRule = Rule::count();
        $totalRekomendasi = Rekomendasi::count();
    
        return view('dashboard', compact(
            'totalAdmin', 'totalTrainer', 'totalMember',
            'totalLatihan', 'totalRule', 'totalRekomendasi'
        ));
    }
        
}
