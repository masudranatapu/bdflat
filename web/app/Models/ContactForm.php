<?php

namespace App\Models;
use App\Traits\RepoResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ContactForm extends Model
{
    use RepoResponse;

    protected $table        = 'CONTACT_FORM';
    protected $primaryKey   = 'PK_NO';
    protected $fillable     = ['NAME','EMAIL','SUBJECT','MESSAGE'];

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $list                           = new ContactForm();
            $list->NAME                     = $request->name;
            $list->EMAIL                    = $request->email;
            $list->SUBJECT                  = $request->subject;
            $list->MESSAGE                  = $request->message;
            $list->save();

        }catch (\Exception $e){
//            dd($e);
            DB::rollback();
            return $this->formatResponse(false, 'Your Message is not submitted successfully !', 'contact-us');
        }
        DB::commit();
        return $this->formatResponse(true, 'Thanks For Contacting With Us !', 'contact-us');
    }
}
