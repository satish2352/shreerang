<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadFinanceDocument extends Model
{
    use HasFactory;
    protected $table = 'upload_finance_documents';
    protected $primaryKey = 'id';
}
