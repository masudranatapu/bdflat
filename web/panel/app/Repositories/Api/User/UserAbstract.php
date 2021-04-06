<?php
namespace App\Repositories\Api\User;
use App\Traits\ApiResponse;
use App\Models\AdminUser;
use DB;

class UserAbstract implements UserInterface
{
    use ApiResponse;

    function __construct() {
    }

    public function getUserList(){

        $data = AdminUser::get();

        if (!empty($data)) {
            return $this->successResponse(200, 'Data is available !', $data, 1);
        }
        return $this->successResponse(404, 'Not found data !', null, 0);
    }
}
