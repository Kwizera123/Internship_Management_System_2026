<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InternshipOpportunity;
use App\Models\Organization;

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

        public function create()
            {
                $organizations = Organization::orderBy('name')->get();

                return view('admin.create-internship-opportunity', [
                    'organizations' => $organizations,
                ]);
            }

        public function store(Request $request)
            {
                // We will add the saving logic here.
            }
}
