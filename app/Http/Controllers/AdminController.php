<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Helper;

use Auth;
use Exception;
use \Carbon\Carbon;
use DB;

use App\Admin;
use App\Customer;
use App\Traits\Actions;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Route;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('demo', ['only' => [
                // 'settings_store', 
                // 'settings_payment_store',
                // 'profile_update',
                // 'password_update',
                // 'send_push',
            ]]);
    }

    public function showDrafts() {
        $drafts = Customer::whereStatus('review')->get();
        return view('admin.drafts_list',compact('drafts'));
    }

    public function showApproved() {
        $approved = Customer::whereStatus('approved')->get();
        return view('admin.approved_list',compact('approved'));
    }

    public function showRejected() {
        $rejected = Customer::whereStatus('rejected')->get();
        return view('admin.rejected_list',compact('rejected'));
    }

    public function showRoles() {
        $roles = Role::where("id",'>',"1")->get();
        return view('admin.roles',compact('roles'));
    }

    public function showAdmins() {
        $admins = Admin::where("id",'>',"1")->get();
        $roles = Role::where("id",'>',"1")->get();
        return view('admin.subadmins',compact('admins'));
    }

    public function createAdmins() {
        $roles = Role::where("id",'>',"1")->get();
        return view('admin.subadmins-create',compact('roles'));
    }

    public function storeAdmins(Request $request) {
        $request['password'] = bcrypt($request->password);
        $admin = Admin::create($request->except(['_token','role']));
        $admin->assignRole($request->role);
        return redirect()->route('admin.subadmins')->with('flash_success','Created Successfully');
    }

    public function editAdmins($id) {
        $admin = Admin::find($id);
        $admin->roles->pluck('id','id');
        $admin->role = $admin->roles[0]->id;
        $roles = Role::where("id",'>',"1")->get();
        return view('admin.subadmins-edit',compact('roles','admin'));
    }

    public function updateAdmins(Request $request) {
        $admin = Admin::find($request->id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        if($request->password!='')
        $admin->password = bcrypt($request->password);
        $admin->save();
        $admin = Admin::find($request->id);
        $admin->syncRoles($request->input('role'));
        return redirect()->route('admin.subadmins')->with('flash_success','Updated Successfully');
    }

    public function createRoles() {
        $permissions = Permission::get();
        return view('admin.create',compact('permissions'));
    }

    public function store_role(Request $request)
    {

        $this->validate($request, [
            'role_name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

            $role = Role::create(['name' => STRTOUPPER($request->input('role_name'))]);
            $role->syncPermissions($request->input('permission'));

            return redirect()->route('admin.roles')->with('flash_success','Created Successfully');

    }

    public function editRoles($id) {
        $role = Role::findOrFail($id);
        $role->permissions = Permission::get();
        $role->UserPermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        ->all();
        return view('admin.edit-role',compact('role'));
    }

    public function updateRoles(Request $request) {
        $role = Role::find($request->id);
        $role->name = STRTOUPPER($request->input('role_name'));
        $role->save();
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('admin.roles')->with('flash_success','Updated Successfully');
    }

    public function changeStatus(Request $request) {
        $drafts = Customer::whereId($request->id)->update(['status'=>$request->status]);
        $customer = Customer::find($request->id);
        $status = $request->status;
		Mail::send('emails.email', ['customer' => $customer, 'status' => $status], function ($mail) use ($customer, $status) {
			$mail->from('admin@demo.com', 'Admin');
			$mail->to($customer->email, $customer->first_name.' '.$customer->last_name)->subject('Status Mail');
		});
        return response()->json(['message' => 'Status changed','status' => $request->status]); 
    }

}