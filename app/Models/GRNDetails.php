<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GRNDetails extends Model
{
    use HasFactory;
    protected $table = 'tbl_grn_details';
    protected $primaryKey = 'id';
}
