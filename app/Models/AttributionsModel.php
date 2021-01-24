<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributionsModel extends Model
{
    use HasFactory;
    protected $table = 'attributions';
    protected $fillable = ['id', 'timetable', 'id_computers', 'id_customers'];
    public $timestamps = false;

    public function customer()
    {
        return $this->belongsTo(CustomersModel::class, 'id_customers');
    }

    public function computer()
    {
        return $this->belongsTo(ComputersModel::class, 'id_computers');
        
    }
}
