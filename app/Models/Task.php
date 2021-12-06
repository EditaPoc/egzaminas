<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    
    protected $fillable=['task_name', 'description', 'add_date', 'completed_date', 'status_id' ];
    
    public function status() {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
