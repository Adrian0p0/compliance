<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmitedForms extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_subject',
        'company_id',
        'title',
        'country',
        'area',
        'lang',
        'message',
        'anonimRenounce',
        'mail-phone',
        'files'
    ];
}
