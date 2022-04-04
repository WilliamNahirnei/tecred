
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomModel extends Model
{
    use HasFactory;

    public $timestamps = false;

    public const RECORD_STATUS_INACTIVE = 0;
    public const RECORD_STATUS_ACTIVE   = 1;

    public const STATUS_ARRAY = [
        self::RECORD_STATUS_ACTIVE   => "Ativo",
        self::RECORD_STATUS_INACTIVE => "Inativo",
    ];
}
