<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regulation extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'status',
        'title',
        'issuingAgency',
        'signer',
        'issuedDate',
        'effectiveDate',
        'attachment',
        'download_path',
        'type'
    ];
}
