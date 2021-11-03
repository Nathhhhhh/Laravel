<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;

class Utils extends Model implements Authenticatable
{
    use BasicAuthenticatable;
    // protected $table ="mon_nom_de_table"; --> pour renommer la table 

    protected $fillable = ['email', 'mot_de_passe','avatar'];

    public function messages(){
        return $this->hasMany(Message::class)->latest();
    }

    public function suivis(){
        return $this->belongsToMany(Utils::class, 'suivis','suiveur_id',"suivi_id");
    }

    public function suit($util){
        
        return $this -> suivis()->where('suivi_id',$util->id)->exists();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }

     /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName() 
    {
        return '';
    }
}
?>
