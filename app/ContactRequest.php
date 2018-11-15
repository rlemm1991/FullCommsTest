<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactRequest extends Model
{
    /**
     * Table name - Usually would follow naming standards by laravel but for the sake of time and preference i like to
     * specific table names in models
     * @var string
     */
    protected $table = "contact_requests";
    /**
     * Fillable columns
     *
     * @var array
     */
    protected $fillable = ['name','email','subject','message','created_at','updated_at'];

    // Relations would go below
}
