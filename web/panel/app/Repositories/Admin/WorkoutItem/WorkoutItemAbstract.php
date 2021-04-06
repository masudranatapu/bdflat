<?php

namespace App\Repositories\Admin\WorkoutItem;

use App\Traits\RepoResponse;
use App\Models\WorkoutItems;
use DB;
use File;

class WorkoutItemAbstract implements WorkoutItemInterface
{

    use RepoResponse;

    public function getPaginatedList($request)
    {
        $data = WorkoutItems::where('body_parts_id', '!=', 0 )
            ->join('workout_body_parts', 'workout_body_parts.id','=','workout_items.body_parts_id')
            ->select('workout_items.id','workout_items.workout_name','workout_items.photo','workout_items.photo_url','workout_items.body_parts_id','workout_items.status','workout_items.created_at','workout_items.updated_at','workout_body_parts.id AS body_id','workout_body_parts.name')->get();

        return $this->formatResponse(true, '','admin.workout-item',$data);
    }

    public function postStore($request)
    {

        $workout = new WorkoutItems();
        $workout->workout_name = $request->workout_name;
        $workout->body_parts_id = $request->body_parts_id;

        $photo =  'workout_item_'. date('dmY'). '_' .time(). '.' . $request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('media/images/workout-item/'), $photo);
        $workout->photo_url = url('media/images/workout-item/' . $photo);
        $workout->photo = $photo;

        $workout->status = $request->status;

        if ($workout->save()) {
            return $this->formatResponse(true, 'Workout Item has been created successfully', 'admin.workout-item');
        }

        return $this->formatResponse(false, 'Unable to create workout item !', 'admin.workout-item.new');
    }

    public function getShow(int $id)
    {
        $data = WorkoutItems::where('id',$id)->first();

        if (!empty($data)) {
            return $this->formatResponse(true, '', 'admin.workout-item.edit', $data);
        }

        return $this->formatResponse(false, 'Did not found data !', 'admin.workout-item', null);
    }

    public function postUpdate($request, $id)
    {
        $workout = WorkoutItems::where('id', $id)->first();
        $workout->workout_name = $request->workout_name;
        $workout->body_parts_id = $request->body_parts_id;

        if ($request->logo != '') {

            if(File::exists(public_path('media/images/workout-item/'.$workout->photo))) {
                File::delete(public_path('media/images/workout-item/'.$workout->photo));
            }

            $photo =  'workout_item_'. date('dmY'). '_' .time(). '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('media/images/workout-item/'), $photo);
            $workout->photo_url = url('media/images/workout-item/' . $photo);
            $workout->photo = $photo;
        }

        $workout->status = $request->status;

        if ($workout->update()) {
            return $this->formatResponse(true, 'Workout Item has been Updated successfully', 'admin.workout-item');
        }

        return $this->formatResponse(false, 'Unable to update workout item !', 'admin.workout-item.new');
    }

    public function delete(int $id)
    {
        WorkoutItems::where('id',$id)->delete();

        return $this->formatResponse(true,'Successfully deleted workout item','admin.workout-item');
    }

}
