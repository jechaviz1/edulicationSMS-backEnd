<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\IncomeCategory;
use App\Models\ExpenseCategory;
use Mail;

class ExpenseCategoryController extends Controller {

    public function list() {
        $data = [];
        $data['title'] = 'Expense Categories List';
        $data['menu_active_tab'] = 'expense-categoris-list';
        $data['expense_categorys'] = ExpenseCategory::orderBy('title', 'asc')->where('is_deleted', '0')->get();

        return view('admin.expense_category.list')->with($data);
    }

    public function add(Request $request) {
        $data = [];
        $data['title'] = 'Add Expense Category';
        $data['menu_active_tab'] = 'add-expense-category';
        $data['role'] = Role::where('is_deleted', '0')->where('id', '!=', '1')->orderBy('id', 'ASC')->get();

        return view('admin.expense_category.add')->with($data);
    }

    public function store(Request $request) {
        $rules = [
            'title' => 'required|string|min:3|max:255',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('insert')
                            ->withInput()
                            ->withErrors($validator);
        } else {
            $data = $request->input();
            try {
                $feestype = new ExpenseCategory();
                $feestype->title = $data['title'];
                $feestype->slug = Str::slug($request->title, '-');
                $feestype->save();
                return redirect()->route('expense_categoris')->with('success', 'Record added successfully.');
            } catch (Exception $e) {
                return redirect()->route('expense_categoris')->with('failed', 'Record not added.');
            }
        }
    }

    public function edit(Request $request, $id) {
        $data = [];
        $data['title'] = 'Edit Expense Category';
        $data['menu_active_tab'] = 'edit-expense-categoris';
        if ($id) {
            $expense_category = ExpenseCategory::find($id);
            $data['role'] = Role::where('is_deleted', '0')->where('id', '!=', '1')->orderBy('id', 'ASC')->get();
            if ($expense_category) {
                $data['expense_category'] = $expense_category;
                return view('admin.expense_category.edit')->with($data);
            } else {
                return redirect()->route('expense_categoris')->with('failed', 'Record not found.');
            }
        } else {
            return redirect()->route('expense_categorisexpense_categoris')->with('failed', 'Record not found.');
        }
    }

    public function update(Request $request, $id) {
        
        if ($id) {
            $request->validate([
                'title' => 'required',
            ]);
            $data = $request->input();
            $expense_category = ExpenseCategory::find($id);
            // dd($fees_category);
            if ($expense_category) {
                
                $expense_category->title = $data['title'];
                $expense_category->slug = Str::slug($request->title, '-');
                $expense_category->status = $request->status;
                $expense_category->save();

                return redirect()->route('expense_categoris')->with('success', 'Record Updated.');
            } else {
                return redirect()->route('expense_categoris')->with('failed', 'Record not found.');
            }
        }
    }

    public function delete($id) {
        if ($id) {
            $expense_category = ExpenseCategory::find($id);
            if ($expense_category) {
                
                $expense_category->is_deleted = '1';
                $expense_category->save();
            }
            return redirect()->route('expense_categoris')->with('success', 'Record deleted.');
        } else {
            return redirect()->route('expense_categoris')->with('failed', 'Record not found.');
        }
    }

}
