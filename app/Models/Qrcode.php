<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Qrcode
 * @package App\Models
 * @version November 13, 2018, 10:20 am UTC
 *
 * @property integer user_id
 * @property string website
 * @property string company_name
 * @property string product_name
 * @property string product_url
 * @property string qrcode_path
 * @property string callback_url
 * @property float ammount
 * @property boolean status
 */
class Qrcode extends Model
{
    use SoftDeletes;

    public $table = 'qrcodes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'website',
        'company_name',
        'product_name',
        'product_url',
        'qrcode_path',
        'callback_url',
        'ammount',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'website' => 'string',
        'company_name' => 'string',
        'product_name' => 'string',
        'product_url' => 'string',
        'qrcode_path' => 'string',
        'callback_url' => 'string',
        'ammount' => 'float',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
       /**
     * Get the transactions for the qrcode.
     */
    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction');
    }
     /**
     * Get the transactions for the qrcode.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    
}
