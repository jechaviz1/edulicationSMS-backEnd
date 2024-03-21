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
use Mail;

class IncomeCategoryController extends Controller {

    public function list() {
        $data = [];
        $data['title'] = 'Income Categories List';
        $data['menu_active_tab'] = 'income-categoris-list';
        $data['income_categorys'] = IncomeCategory::orderBy('title', 'asc')->where('is_deleted', '0')->get();

        return view('admin.income_category.list')->with($data);
    }

    public function add(Request $request) {
        $data = [];
        $data['title'] = 'Add Income Category';
        $data['menu_active_tab'] = 'add-income-category';
        $data['role'] = Role::where('is_deleted', '0')->where('id', '!=', '1')->orderBy('id', 'ASC')->get();

        return view('admin.income_category.add')->with($data);
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
                $feestype = new IncomeCategory();
                $feestype->title = $data['title'];
                $feestype->slug = Str::slug($request->title, '-');
                $feestype->save();
                return redirect()->route('income_categoris')->with('success', 'Record added successfully.');
            } catch (Exception $e) {
                return redirect()->route('income_categoris')->with('failed', 'Record not added.');
            }
        }
    }

    public function edit(Request $request, $id) {
        $data = [];
        $data['title'] = 'Edit Income Category';
        $data['menu_active_tab'] = 'income-categoris-list';
        if ($id) {
            $income_category = IncomeCategory::find($id);
            $data['role'] = Role::where('is_deleted', '0')->where('id', '!=', '1')->orderBy('id', 'ASC')->get();
            if ($income_category) {
                $data['income_category'] = $income_category;
                return view('admin.income_category.edit')->with($data);
            } else {
                return redirect()->route('income_categoris')->with('failed', 'Record not found.');
            }
        } else {
            return redirect()->route('income_categoris')->with('failed', 'Record not found.');
        }
    }

    public function update(Request $request, $id) {
        
        if ($id) {
            $request->validate([
                'title' => 'required',
            ]);
            $data = $request->input();
            $income_category = IncomeCategory::find($id);
            // dd($fees_category);
            if ($income_category) {
                
                $income_category->title = $data['title'];
                $income_category->slug = Str::slug($request->title, '-');
                $income_category->status = $request->status;
                $income_category->save();

                return redirect()->route('income_categoris')->with('success', 'Record Updated.');
            } else {
                return redirect()->route('income_categoris')->with('failed', 'Record not found.');
            }
        }
    }

    public function delete($id) {
        if ($id) {
            $income_category = IncomeCategory::find($id);
            if ($income_category) {
                
                $income_category->is_deleted = '1';
                $income_category->save();
            }
            return redirect()->route('income_categoris')->with('success', 'Record deleted.');
        } else {
            return redirect()->route('income_categoris')->with('failed', 'Record not found.');
        }
    }

}
