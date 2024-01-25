<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdKind;
use App\Models\Advertiser;

class Ad extends Model
{
  
    use HasFactory;

    public function adkind(){
      //カラム kind_id とリレーションしている。
      return $this->belongsTo(AdKind::class,'kind_id');
    }
    
    public function advertiser(){
      return $this->belongsTo(Advertiser::class);
    }

}
