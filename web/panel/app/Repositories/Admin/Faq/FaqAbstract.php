<?php
namespace App\Repositories\Admin\Faq;

use App\Models\Faq;
use App\Traits\RepoResponse;
use DB;


class FaqAbstract implements FaqInterface
{
    use RepoResponse;

    protected $faq;

    public function __construct(Faq $faq)
    {
        $this->faq = $faq;
    }

    public function getPaginatedList($request, int $per_page = 5)
    {
        $data = $this->faq->where('is_active', 1)->paginate($per_page);
        return $this->formatResponse(true, '', 'admin.faq.index', $data);
    }


    public function postStore($request)
    {
        DB::beginTransaction();
        try {
            $faq                   = new Faq();
            $faq->question        = $request->question;
            $faq->answer          = $request->answer;
            $faq->save();
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return $this->formatResponse(false, 'Faq not created successfully !', 'admin.faq.list');
        }
        DB::commit();

        return $this->formatResponse(true, 'Faq has been created successfully !', 'admin.faq.list');
    }

    public function findOrThrowException($id)
    {
        $data = $this->faq->where('pk_no', '=', $id)->first();

        if (!empty($data)) {
            return $this->formatResponse(true, '', 'admin.faq.edit', $data);
        }

        return $this->formatResponse(false, 'Did not found data !', 'admin.faq.list', null);
    }


    public function postUpdate($request, $id)
    {

        DB::beginTransaction();

        try {

            $faq                   = $this->faq->find($id);
            $faq->question         = $request->question;
            $faq->answer           = $request->answer;
            $faq->update();

            

        } catch (\Exception $e) {
            DB::rollback();

            return $this->formatResponse(false, 'Unable to update faq !', 'admin.faq.list');
        }

        DB::commit();

        return $this->formatResponse(true, 'Faq has been updated successfully !', 'admin.faq.list');
    }

    public function delete($id)
    {
        DB::begintransaction();
        try {
            $faq = $this->faq->find($id);
            $faq->is_active = 0;
            $faq->update();
        } catch (\Exception $e) {
            DB::rollback();

            return $this->formatResponse(false, 'Unable to delete this action !', 'admin.faq.list');
        }
        DB::commit();

        return $this->formatResponse(true, 'Successfully delete this action !', 'admin.faq.list');
    }




}
