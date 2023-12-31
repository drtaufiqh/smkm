<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use App\Models\PembimbingLapangan;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;



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


    
      

    public function info()
    {
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
        return $this->hasOne(UserInfo::class, 'user_id');
    }
    
    public function info1()
    {
        switch ($this->role) {
            case "mhs":
                return $this->hasOne(Mahasiswa::class, 'id_user');
            case "dospem":
                return $this->hasOne(DosenPembimbing::class, 'id_user');
            case "pemlap":
                return $this->hasOne(PembimbingLapangan::class, 'id_user');
            case "instansi":
                return $this->hasOne(Instansi::class, 'id_user')->where('is_prov', false);
            case "prov":
                return $this->hasOne(Instansi::class, 'id_user')->where('is_prov', true);
            case "admin":
                return $this->hasOne(Admin::class, 'id_user');
            default:
                // Handle case when role is not recognized or handle accordingly
                return null;
        }
        return $this->hasOne(UserInfo::class);
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
