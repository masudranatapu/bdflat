<?php
namespace App\Repositories\Admin\GymAdmin;

use App\Models\User;
use App\Traits\RepoResponse;
use App\Repositories\Admin\Auth\AuthAbstract;
use App\Models\Auth;
use App\Models\AuthRole;
use DB;
use File;

class GymAdminAbstract implements GymAdminInterface
{
    use RepoResponse;

    protected $user;
    protected $auth;
    protected $auth_role;

    public function __construct(User $user, AuthRole $auth_role, AuthAbstract $auth)
    {
        $this->user = $user;
        $this->auth = $auth;
        $this->auth_role = $auth_role;
    }

    public function getPaginatedList($request)
    {
        $data = Auth::where('auths.user_type','!=',1)
            ->join('users', 'users.auth_id', '=', 'auths.id')
            ->join('auth_role', 'auth_role.auth_id', '=', 'auths.id')
            ->join('roles', 'roles.id', '=', 'auth_role.role_id')
            ->join('gyms', 'users.gym_id', '=', 'gyms.id')
            ->select('auths.username','auths.email','auths.mobile_no','auths.can_login','users.first_name','users.last_name','users.designation','users.auth_id','users.profile_pic_url','users.status','roles.role_name','users.gym_id','gyms.name')->get();
        return $this->formatResponse(true, '', 'admin', $data);
    }

    public function postStore($request)
    {
        DB::beginTransaction();

        try {
            $auth = $this->auth->postStore($request);

            $gymAdmin = new User();
            $gymAdmin->first_name = $request->first_name;
            $gymAdmin->last_name = $request->last_name;
            $gymAdmin->designation = $request->designation;
            $gymAdmin->auth_id = $auth->id;
            $gymAdmin->gym_id = $request->gym;
            $file_name = 'profile_'. date('dmY'). '_' .time(). '.' . $request->profile_pic->getClientOriginalExtension();
            $request->profile_pic->move(public_path('media/images/profile/'), $file_name);
            $gymAdmin->profile_pic_url = url('media/images/profile/'.$file_name);
            $gymAdmin->profile_pic = $file_name;
            $gymAdmin->status = $request->status;
            $gymAdmin->save();

            $roleAuth = new AuthRole();
            $roleAuth->auth_id = $auth->id;
            $roleAuth->role_id = $request->role;
            $roleAuth->save();

        } catch (\Exception $e) {
            DB::rollback();

            return $this->formatResponse(false, 'Unable to create Gym admin !', 'admin.gym-admin');
        }

        DB::commit();

        return $this->formatResponse(true, 'Gym Admin has been created successfully !', 'admin.gym-admin');
    }

    public function postUpdate($request, int $id)
    {
        DB::beginTransaction();

        try {
            $this->auth->postUpdate($request, $id);

            $gymAdmin = User::where('auth_id', $id)->first();
            $gymAdmin->first_name = $request->first_name;
            $gymAdmin->last_name = $request->last_name;
            $gymAdmin->designation = $request->designation;

            if ($request->profile_pic != '') {

                if(File::exists(public_path('media/images/profile/'.$gymAdmin->profile_pic))) {
                    File::delete(public_path('media/images/profile/'.$gymAdmin->profile_pic));
                }

                $file_name = 'profile_'. date('dmY'). '_' .time(). '.' . $request->profile_pic->getClientOriginalExtension();
                $request->profile_pic->move(public_path('media/images/profile/'), $file_name);
                $gymAdmin->profile_pic_url = url('media/images/profile/'.$file_name);
                $gymAdmin->profile_pic = $file_name;
            }

            $gymAdmin->status = $request->status;
            $gymAdmin->gym_id = $request->gym;
            $gymAdmin->update();

            $roleAuth = AuthRole::where('Auth_id',$id)->first();
            $roleAuth->role_id = $request->role;
            $roleAuth->update();

        } catch (\Exception $e) {
            DB::rollback();

            return $this->formatResponse(false, 'Unable to update gym admin !', 'admin.gym-admin');
        }

        DB::commit();

        return $this->formatResponse(true, 'Gym Admin User has been updated successfully !', 'admin.gym-admin');

    }

    public function getShow(int $id)
    {
        $data =  Auth::select('*')
            ->join('users', 'users.auth_id', '=', 'auths.id')
            ->join('auth_role', 'auth_role.auth_id', '=', 'auths.id')
            ->join('gyms', 'users.gym_id', '=', 'gyms.id')
            ->where('auths.id', $id)
            ->first();

        if (!empty($data)) {
            return $this->formatResponse(true, '', 'admin.gym-admin.gym-admin', $data);
        }

        return $this->formatResponse(false, 'Did not found data !', 'admin.gym-admin', null);
    }

    public function delete(int $id)
    {
        DB::begintransaction();

        try {

            User::where('auth_id', $id)->delete();
            Auth::where('id',$id)->delete();

        } catch (\Exception $e) {
            DB::rollback();

            return $this->formatResponse(false, 'Unable to delete admin user !', 'admin.gym-admin');
        }

        DB::commit();

        return $this->formatResponse(true, 'Successfully delete admin user !', 'admin.gym-admin');
    }

}
