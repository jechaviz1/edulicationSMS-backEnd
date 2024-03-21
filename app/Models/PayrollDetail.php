<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollDetail extends Model {

    protected $table = 'payroll_details';
    protected $fillable = [
        'payroll_id', 'title', 'amount', 'status', 'created_by', 'updated_by',
    ];

    use HasFactory;
    
    public function payroll()
    {
        return $this->belongsTo(Payroll::class, 'payroll_id');
    }
}