<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;

class Utils extends Model implements Authenticatable
{
    use BasicAuthenticatable;

    protected $fillable = ['email', 'mot_de_passe'];

    public function messages(){
        return $this->hasMany(Message::class)->latest();
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
