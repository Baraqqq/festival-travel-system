<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    use HasFactory;

    protected $fillable = [
        'naam', 'locatie', 'genre', 'datum', 'beschrijving'
    ];

    public function buses()
    {
        return $this->hasMany(Bus::class);
    }
}