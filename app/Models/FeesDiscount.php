<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeesDiscount extends Model {

    protected $table = 'fees_discounts';
    protected $fillable = [
        'title', 'start_date', 'end_date', 'amount', 'type', 'status'
    ];

    use HasFactory;
    
    public function feesCategories()
    {
        return $this->belongsToMany(FeesCategory::class, 'fees_category_fees_discount', 'fees_discount_id', 'fees_category_id');
    }

    public function statusTypes()
    {
        return $this->belongsToMany(StatusType::class, 'fees_discount_status_type', 'fees_discount_id', 'status_type_id');
    }
    
    public static function availability($discount, $student)
    {
        $discount_type = FeesDiscount::where('id', $discount)
                            ->where('status', '1')->first();

        foreach($discount_type->statusTypes as $statusType){

            $availability = Student::where('id', $student)->with('statuses')->whereHas('statuses', function ($query) use ($statusType){
                $query->where('status_type_id', $statusType->id);
            })->first();

            if($availability == true){
                return $availability;
                break;
            }

        }
    }
}