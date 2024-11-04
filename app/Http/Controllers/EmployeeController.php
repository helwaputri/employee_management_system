<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $employees = Employee::where('name', 'LIKE', "%$search%")
                            ->orWhere('position', 'LIKE', "%$search%")
                            ->paginate(10);

        return view('employees.index', compact('employees', 'search'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'position' => 'required|string',
            'salary' => 'required|numeric|min:0',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('photo')) {
            $fileName = time() . '_' . $request->photo->getClientOriginalName();
            $request->photo->move(public_path('uploads'), $fileName);
            $data['photo'] = $fileName;
        }

        Employee::create($data);
        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil ditambahkan!');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'position' => 'required|string',
            'salary' => 'required|numeric|min:0',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('photo')) {
            if ($employee->photo) {
                unlink(public_path('uploads') . '/' . $employee->photo);
            }
            $fileName = time() . '_' . $request->photo->getClientOriginalName();
            $request->photo->move(public_path('uploads'), $fileName);
            $data['photo'] = $fileName;
        }

        $employee->update($data);
        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil diperbarui!');
    }

    public function destroy(Employee $employee)
    {
        if ($employee->photo) {
            unlink(public_path('uploads') . '/' . $employee->photo);
        }
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil dihapus!');
    }
}
