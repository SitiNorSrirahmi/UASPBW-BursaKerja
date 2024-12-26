<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tabel di database bernama 'pekerjaans'
    protected $table = 'pekerjaans';

    // Kolom-kolom yang dapat diisi
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'user_id',
    ];

    // Relasi ke model Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi ke model User (Employer)
    public function employer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke model Application
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
