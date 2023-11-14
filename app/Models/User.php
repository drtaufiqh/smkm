<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function info(){
        switch ($this->role) {
            case "mhs":
                return Mahasiswa::where('id_user', $this->id)->first();
            case "dospem":
                return DosenPembimbing::where('id_user', $this->id)->first();
            case "pemlap":
                return PembimbingLapangan::where('id_user', $this->id)->first();
            case "instansi":
                return Instansi::where('id_user', $this->id)->where('is_prov', false)->first();
            case "prov":
                return Instansi::where('id_user', $this->id)->where('is_prov', true)->first();
            case "admin":
                return Admin::where('id_user', $this->id)->first();
            default:
                // Handle case when role is not recognized or handle accordingly
                return null;
        }
    }
    
    public function showRole(){
        switch ($this->role) {
            case "mhs":
                return 'Mahasiswa';
            case "dospem":
                return 'Dosen Pembimbing';
            case "pemlap":
                return 'Pembimbing Lapangan';
            case "instansi":
                return 'BPS Instansi';
            case "prov":
                return 'BPS Provinsi';
            case "admin":
                return 'Admin';
            default:
                // Handle case when role is not recognized or handle accordingly
                return null;
        }
    }
}
