<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrdersModel extends Model
{
    use HasFactory;
    protected $table = 'purchase';
    protected $primaryKey = 'id';
    protected $fillable = [
        'inv_id','client_name','part_number','description',
        'email','hsn','billing_address',
        'invoice_date','due_date','items','note','discount','total','status'
    ];
}
