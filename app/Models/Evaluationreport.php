<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluationreport extends Model
{
    public function tender()
    {
      return $this->belongsTo(Tender::class);
    }
}
