<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model {

    protected $table = 'payrolls';
    protected $fillable = [
        'user_id', 'basic_salary', 'salary_type', 'total_earning', 'total_allowance', 'bonus', 'total_deduction', 'gross_salary', 'tax', 'net_salary', 'salary_month', 'pay_date', 'payment_method', 'note', 'status', 'created_by', 'updated_by',
    ];

    use HasFactory;
    
    public function Employ()
    {
        return $this->belongsTo('App\Models\Employee', 'user_id');
    }
    public function details()
    {
        return $this->hasMany(PayrollDetail::class, 'payroll_id', 'id');
    }
}