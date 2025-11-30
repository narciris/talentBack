<?php 

class RevokedPermission {

    public function execute($userId, $permission){
        
        $permission = DB::table('users_permissions')
        ->where('user_id',$userId)
        ->where('name',$permission);

        if(!$permission){
           $permission->name = $permission;
           $permission->user_id = $userId;

           $permission->save();
        }

        if($permission){
            DB::table('user_permissions')
            ->where('user_id',$userId)
            ->where('name',$permission)
            ->delete();
        }
        return $permission;
    }
}