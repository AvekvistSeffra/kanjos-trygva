<?php 
namespace App\Models;
use CodeIgniter\Model;
use Exception;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', "phone", 'email', "password"];

    public function findUserById($id)
    {
        $user = $this
            ->asArray()
            ->where(['id' => $id])
            ->first();

        if (!$user) throw new Exception('Could not find user for specified ID');

        return $user;
    }
}
