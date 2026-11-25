<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InternshipOpportunity;

class InternshipOpportunityController extends Controller
{
    public function index()
{
    $opportunities = InternshipOpportunity::with('organization')
        ->orderBy('created_at', 'desc')
        ->paginate(10);

    return view('admin.internship-opportunities', [
        'opportunities' => $opportunities,
    ]);
}
}
