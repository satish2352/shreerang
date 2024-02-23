<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignDetailsModel extends Model
{
    use HasFactory;
    protected $table = 'designs_details';
    protected $primaryKey = 'id';
    protected $fillable = ['design_name', 'product_quantity', 'product_size'];

    public function design()
    {
        return $this->belongsTo(DesignModel::class, 'designs_id');
    }

}
