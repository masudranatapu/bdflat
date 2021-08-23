<?php

namespace App\Models;
use App\Traits\RepoResponse;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class ContactForm extends Model
{
    use RepoResponse;

    protected $table        = 'WEB_CONTACT_MESSAGE';
    protected $primaryKey   = 'PK_NO';
    public $timestamps      = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function($model)
        {
            $user = Auth::user();
            $model->SS_CREATED_BY = $user->PK_NO ?? null;
        });

        static::updating(function($model)
        {
            $user = Auth::user();
            $model->SS_MODIFIED_BY = $user->PK_NO ?? null;
        });
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $list                           = new ContactForm();
            $list->NAME                     = $request->name;
            $list->EMAIL                    = $request->email;
            $list->SUBJECT                  = $request->subject;
            $list->MESSAGE_TEXT             = $request->message;
            $list->SS_CREATED_ON            = Carbon::now();
            $list->SS_MODIFIED_ON           = Carbon::now();
            $list->save();

        }catch (\Exception $e){
            dd($e);
            DB::rollback();
            return $this->formatResponse(false, 'Your Message is not submitted successfully !', 'contact-us');
        }
        DB::commit();
        return $this->formatResponse(true, 'Thanks For Contacting With Us !', 'contact-us');
    }
}
