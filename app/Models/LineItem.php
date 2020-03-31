<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LineItem extends Model
{
     protected $primaryKey  = 'line_itemID';
     protected $table       = 'line_items';
     protected $fillable    = ['type','transactionID','memo2','accountID','amount'];

}
