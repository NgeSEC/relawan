<?php
/**
 * Created by PhpStorm.
 * User: dyangalih
 * Date: 2019-01-06
 * Time: 00:30
 */

namespace App\Repositories;


use App\Models\Role;
use Illuminate\Database\QueryException;

/**
 * Class RoleRepository
 * @package App\Repositories
 */
class RoleRepository
{
    private $role;
    
    public function __construct()
    {
        $this->role = new Role();
    }
    
    /**
     * @param $name
     * @return mixed
     */
    public function getRoleByName($name)
    {
        return $this->role->where('name', $name)->get();
    }
    
    /**
     * @param $request
     * @return $this|null
     */
    public function addRole($request)
    {
        try {
            $newRole = new Role();
            $newRole->name = $request->name;
            $newRole->user_id = $request->user_id;
            $newRole->save();
            return $this;
        } catch (QueryException $e) {
            report($e);
            return null;
        }
    }
}