<?php
use Illuminate\Database\Eloquent\Model as Model;

class Users extends Model {

    public $timestamps    = false;
    public $incrementing  = false;
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id', 'discriminator', 'username', 'role', 'premium_level',
        'premium_expires', 'theme_id', 'email', 'avatar'
    ];

    public function isRole($search) {
        $user_roles = json_decode(strtolower($this->roles), true);

        if (is_array($search)) {

            foreach ($search as $role) {
                if (in_array(strtolower($role), $user_roles)) {
                    return true;
                }
            }
            return false;
        }

        return in_array(strtolower($search), $user_roles);
    }

}
