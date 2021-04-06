<?php
namespace App\Repositories\Admin\WorkoutBodyParts;

use App\Models\WorkoutBodyParts;
use App\Traits\RepoResponse;
use DB;

class WorkoutBodyPartsAbstract implements WorkoutBodyPartsInterface
{
    use RepoResponse;

    protected $bodyParts;

    public function __construct(WorkoutBodyParts $bodyParts)
    {
        $this->bodyParts = $bodyParts;
    }

    public function getPaginatedList($request, int $per_page = 20)
    {
        $data = $this->bodyParts::paginate($per_page);
        return $this->formatResponse(true, '', 'admin.workout-body-parts', $data);
    }

    public function postStore($request)
    {
        DB::beginTransaction();

        try {

            $bodyParts = new WorkoutBodyParts();
            $bodyParts->name = $request->name;
            $bodyParts->status = 1;
            $bodyParts->save();

        } catch (\Exception $e) {
            DB::rollback();

            return $this->formatResponse(false, 'Unable to create workout body Parts !', 'admin.workout-body-parts');
        }

        DB::commit();

        return $this->formatResponse(true, 'workout body parts has been created successfully !', 'admin.workout-body-parts');
    }

    public function postUpdate($request, int $id)
    {
        DB::beginTransaction();

        try {

            $bodyParts = $this->bodyParts->where('id', $id)->first();
            $bodyParts->name = $request->name;
            $bodyParts->status = 1;
            $bodyParts->update();

        } catch (\Exception $e) {
            DB::rollback();

            return $this->formatResponse(false, 'Unable to update workout body parts !', 'admin.workout-body-parts');
        }

        DB::commit();
        return $this->formatResponse(true, 'Workout Body Parts has been updated successfully !', 'admin.workout-body-parts');

    }

    public function getShow(int $id)
    {
        $data =  WorkoutBodyParts::where('id',$id)->first();

        if (!empty($data)) {
            return $this->formatResponse(true, '', 'admin.workout-body-parts.edit', $data);
        }

        return $this->formatResponse(false, 'Did not found data !', 'admin.workout-body-parts', null);
    }

    public function delete(int $id)
    {
        DB::begintransaction();
        try {
            WorkoutBodyParts::where('id', $id)->delete();
            DB::commit();
            echo 'deleted successfully';
        } catch (\Exception $e) {
            DB::rollback();

            return $this->formatResponse(false, 'Unable to delete workout body parts !', 'admin.workout-body-parts');
        }

        return $this->formatResponse(true, 'Successfully delete workout body parts !', 'admin.workout-body-parts');
    }
    public function getList()
    {
        return DB::table('workout_body_parts')->pluck('name', 'id');
    }
}
