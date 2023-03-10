<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Notifications\Notifyusers;


class UserRoleController extends Controller
{
    public function addrole(){
    	$roles = Role::all();
    	$Permission = Permission::all();
    	// dd($roles);
        //$user = Auth::user();
        //$user->notify(new Notifyusers($user->email, $user->name));

    	return view('UserRoles.addroles', ['role'=> $roles, 'Permission'=>$Permission]);
    }

    public function addrole_save(Request $request){

    	 $this->validate($request,[
            'role' => 'required|min:4|max:25',
        ]);


    	 $data = [
    	 	'name'=> $request->input('role')
    	 ];

    	 $role = Role::create($data);

    	 if ($role) {
    	 	return Redirect()->back()->with('message', 'Role Added Succussfully!');
    	 }
    }


    public function addpermission_save(Request $request){

    	 $this->validate($request,[
            'Permission' => 'required|min:4|max:25',
        ]);


    	 $data = [
    	 	'name'=> $request->input('Permission')
    	 ];

    	 $Permission = Permission::create($data);

    	 if ($Permission) {
    	 	return Redirect()->back()->with('message', 'Permission Added Succussfully!');
    	 }
    }




    public function edit_role_per($id, Request $request){
        $type = $request->input('type');
        if ($type == 'perm') {
            $Permission = Permission::where('id',$id)->first();

            return view('UserRoles.editrole_per', ['Permission'=>$Permission]);

        }else{
            $roles = Role::where('id',$id)->first();
             return view('UserRoles.editrole_per', ['role'=> $roles]);
        }

    }




public function edit_role_save(Request $request){
          $id = $request->input('hiddenid');


            $this->validate($request,[
                'role' => 'required|min:4|max:25',
            ]);

            $roles = Role::where('id',$id)->first();

            // dd($roles);

            $roles->name = $request->input('role');
            $roles->save();

    return Redirect()->route('add-user-role')->with('message', 'Role Updated Succussfully!');
}



public function edit_per_save(Request $request){
     $id = $request->input('hiddenid');

     $this->validate($request,[
                 'Permission' => 'required|min:4|max:25',
            ]);

            $Permission = Permission::where('id',$id)->first();

            $Permission->name = $request->input('Permission');
            $Permission->save();

            return Redirect()->route('add-user-role')->with('message', 'Permission Updated Succussfully!');
}





public function assignrole_to_permission($id){
    $roles = Role::where('id',$id)->first();
    $Permission = Permission::all();
    $role_permissions = Role::with('permissions')->get();
    //dd($role_permissions);
    return view('UserRoles.assign_role', ['role'=> $roles, 'Permission'=>$Permission, 'role_per' => $role_permissions]);

}




public function assignrole_to_permission_save(Request $request){
    $roleid = $request->input('roleid');
    $permissions = $request->input('permissions');

    // dd($perm);

    $role = Role::where('id',$roleid)->first();

    $role->syncPermissions($permissions);


    return Redirect()->route('add-user-role')->with('message', 'Permission Assigned to Role Succussfully!');

}


public function edit_permission($id){
    $roles = Role::where('id',$id)->first();
    $Permission = Permission::all();
    $role_permissions = Role::with('permissions')->get();
    //dd($role_permissions);
    return view('UserRoles.assign_role', ['role'=> $roles, 'Permission'=>$Permission, 'role_per' => $role_permissions]);
}



//users and their roles
public function user_roles_display(){
    // $user = Auth::user();
    // $user->assignRole('is_admin');
    $role_permissions = Role::with('permissions')->get();
    $all_users_with_all_their_roles = User::with('roles')->get();
    //dd($all_users_with_all_their_roles);
    return view('UserRoles.user_roles', ['user_roles'=> $all_users_with_all_their_roles,
                                        'role_pers' => $role_permissions]);
}



//Screen lock

public function lockscreen(Request $request){
    $user = Auth::user();
    if ($user){
        $fullname = auth()->user()->name;
        $uemail = auth()->user()->email;
        $pro_pic = auth()->user()->pro_pic;
        
        $request->session()->put('email', $uemail);
        $request->session()->put('fullname', $fullname);
        $request->session()->put('pro_pic', $pro_pic);
    }else{
            $fullname = $request->session()->get('fullname');
            $uemail = $request->session()->get('email');
            $pro_pic = $request->session()->get('pro_pic');

    }
    
    //dd($session);
    Auth::logout();
    return view('layouts.lockscreen', compact('fullname','uemail', 'pro_pic'));
}




public function user_force_logout(){
    $users = User::all();
    return view('UserRoles.alluserforce_logout', ['users'=>$users]);
}


//force logout update script

public function user_force_logout_update($id){
   
   //echo $id;

   //exit();

   $user = User::where('id', $id)->first();
   //dd($user);
   $user->force_logout = 1;
   $user->save();

   return Redirect()->route('logout-user-force')->with('message', 'User Session Forced Out Succussfully!');
}


public function user_force_logout_enable($id){
    $user = User::where('id',$id)->first();
   //dd($user);
   $user->force_logout = 0;
   $user->save();

   return Redirect()->route('logout-user-force')->with('message', 'User Session Enabled Succussfully!');
}



public function user_set_locale(Request $request, $lang){

    //echo $lang;
    //exit();
    $request->session()->put('user_locale', $lang);

    //$fullname = $request->session()->get('user_locale');

    //dd($fullname);


    return redirect()->back();
}











}
