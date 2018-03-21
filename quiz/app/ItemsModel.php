<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemsModel extends Model
{
    public $timestamps = false;
    protected $table = 'items';
    protected $primaryKey = 'item_id';
    protected $fillable = ['item_id', 'user_id', 'item_name', 'item_price', 'item_stock'];
    protected $guarded = [];
}
