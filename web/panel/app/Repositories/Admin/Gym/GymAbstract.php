<?php

namespace App\Repositories\Admin\Gym;

use App\Traits\RepoResponse;
use App\Models\Gym;
use DB;
use File;

class GymAbstract implements GymInterface
{

    use RepoResponse;

    public function getPaginatedList($request)
    {
        $data = Gym::paginate(20);

        return $this->formatResponse(true, '','admin.gym',$data);
    }

    public function postStore($request)
    {
        $gym = new Gym();
        $gym->name = $request->name;
        $gym->code = $request->code;
        $gym->moto = $request->moto;
        $gym->address = $request->address;
        $gym->established = $request->established;
        $logo =  'logo_'. date('dmY'). '_' .time(). '.' . $request->logo->getClientOriginalExtension();
        $request->logo->move(public_path('media/images/gym/'), $logo);
        $gym->logo_url = url('media/images/gym/' . $logo);
        $gym->logo = $logo;
        $banner = 'banner_'. date('dmY'). '_' .time(). '.' . $request->banner->getClientOriginalExtension();
        $request->banner->move(public_path('media/images/gym/'), $banner);
        $gym->banner_url = url('media/images/gym/' . $banner);
        $gym->banner = $banner;
        $gym->status = $request->status;

        if ($gym->save()) {
            return $this->formatResponse(true, 'Gym user has been created successfully', 'admin.gym');
        }

        return $this->formatResponse(false, 'Unable to create gym user !', 'admin.gym.new');
    }

    public function getShow(int $id)
    {
        $data = Gym::where('id',$id)->first();

        if (!empty($data)) {
            return $this->formatResponse(true, '', 'admin.gym.edit', $data);
        }

        return $this->formatResponse(false, 'Did not found data !', 'admin.gym', null);
    }

    public function postUpdate($request, $id)
    {
        $gym = Gym::where('id', $id)->first();
        $gym->name = $request->name;
        $gym->code = $request->code;
        $gym->moto = $request->moto;
        $gym->address = $request->address;
        $gym->established = $request->established;

        if ($request->logo != '') {

            if(File::exists(public_path('media/images/gym/'.$gym->logo))) {
                File::delete(public_path('media/images/gym/'.$gym->logo));
            }

            $logo =  'logo_'. date('dmY'). '_' .time(). '.' . $request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('media/images/gym/'), $logo);
            $gym->logo_url = url('media/images/gym/' . $logo);
            $gym->logo = $logo;
        }

        if ($request->banner != '') {

            if(File::exists(public_path('media/images/gym/'.$gym->banner))) {
                File::delete(public_path('media/images/gym/'.$gym->banner));
            }

            $banner = 'banner_'. date('dmY'). '_' .time(). '.' . $request->banner->getClientOriginalExtension();
            $request->banner->move(public_path('media/images/gym/'), $banner);
            $gym->banner_url = url('media/images/gym/' . $banner);
            $gym->banner = $banner;
        }

        $gym->status = $request->status;

        if ($gym->update()) {
            return $this->formatResponse(true, 'Gym user has been Updated successfully', 'admin.gym');
        }

        return $this->formatResponse(false, 'Unable to update gym user !', 'admin.gym.new');
    }

    public function delete(int $id)
    {
        Gym::where('id',$id)->delete();

        return $this->formatResponse(true,'Successfully deleted gym user','admin.gym');
    }

    public function getList()
    {
        return DB::table('gyms')->pluck('name', 'id');
    }

}
