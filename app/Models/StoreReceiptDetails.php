<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreReceiptDetails extends Model
{
    use HasFactory;
    protected $table = 'store_receipt_details';
    protected $primaryKey = 'id';
}
