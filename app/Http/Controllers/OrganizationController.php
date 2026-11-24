<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;

class OrganizationController extends Controller
{
   public function index(Request $request)
{
    $query = Organization::query();

    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('type')) {
    $query->where('type', $request->type);
    }

    $organizations = $query->orderBy('name')
        ->paginate(10);

    return view('admin.organizations', [
        'organizations' => $organizations,
    ]);
}

    public function create()
    {
        return view('admin.organizations-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:organizations,name'],
            'type' => ['required', 'in:company,government,ngo,educational_institution,other'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'address' => ['nullable', 'string', 'max:255'],
            'website' => ['nullable', 'url', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        Organization::create($validated);

        return redirect()
            ->route('admin.organizations')
            ->with('success', 'Organization registered successfully.');
    }


    public function edit(Organization $organization)
    {
        return view('admin.organizations-edit', [
            'organization' => $organization,
        ]);
    } 

    public function update(Request $request, Organization $organization)
        {
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255', 'unique:organizations,name,' . $organization->id],
                'type' => ['required', 'in:company,government,ngo,educational_institution,other'],
                'email' => ['nullable', 'email', 'max:255'],
                'phone' => ['nullable', 'string', 'max:30'],
                'address' => ['nullable', 'string', 'max:255'],
                'website' => ['nullable', 'url', 'max:255'],
                'description' => ['nullable', 'string'],
            ]);

            $organization->update($validated);

            return redirect()
                ->route('admin.organizations')
                ->with('success', 'Organization updated successfully.');
        } 


    public function destroy(Organization $organization)
        {
            $organization->delete();

            return redirect()
                ->route('admin.organizations')
                ->with('success', 'Organization deleted successfully.');
        }

}
