<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxSetting extends Model {

    protected $table = 'tax_settings';
    protected $fillable = [
        'min_amount', 'max_amount', 'percentange', 'max_no_taxable_amount', 'status',
    ];

    use HasFactory;
    



}