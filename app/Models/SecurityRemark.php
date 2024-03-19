<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecurityRemark extends Model
{
    use HasFactory;
    protected $table = 'security_remark';
    protected $primaryKey = 'id';
}
