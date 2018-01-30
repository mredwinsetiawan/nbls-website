<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
<<<<<<< HEAD
    //
=======
  public function research(){
    $this->belongsTo('App\Research', 'research_id');
  }

>>>>>>> e0fcfc5a4fd6f4e1984dbc71ced1839adc1cf07d
}
