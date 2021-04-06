<?php
namespace App\Repositories\Admin\Customer;

use DB;
use App\Models\Customer;
use App\Traits\RepoResponse;
use Illuminate\Support\Facades\Hash;

class CustomerAbstract implements CustomerInterface
{
    use RepoResponse;

    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
  
    }

    public function getPaginatedList($request, int $per_page = 5)
    {
        $data = $this->customer->where('is_delete',0)->orderBy('is_active', 'asc')->orderBy('name', 'asc')->get();
        return $this->formatResponse(true, '', 'admin.customer.index', $data);
    }

    public function getShow(int $id)
    {
        $data =  Customer::where('is_delete', 0)->first();

        if (!empty($data)) {

            return $this->formatResponse(true, 'Data found', 'admin.customer.edit', $data);
        }

        return $this->formatResponse(false, 'Did not found data !', 'admin.customer.list', null);
    }

    

    public function postStore($request)
    {
    
    

        DB::beginTransaction();

        try {
            $customer                  = new Customer();
            $customer->name            = $request->name;
            $customer->email           = $request->email;
            $customer->password        = Hash::make($request->password);
            $customer->is_active       = 1;
            $customer->save();

        } catch (\Exception $e) {
            DB::rollback();
            return $this->formatResponse(false, 'Customer not created successfully !', 'admin.customer.list');
        }
        DB::commit();

        return $this->formatResponse(true, 'Customer has been created successfully !', 'admin.customer.list');
    }

    public function postUpdate($request, $pk_no)
    {
        
        $customer = Customer::find($pk_no);
        $customer->name            = $request->name;
        $customer->mobile          = $request->mobile;
        $customer->mobile1         = $request->mobile1;
        $customer->area_id         = $request->area;
        if ($request->password) {
            $customer->password        = Hash::make($request->password);
        }
        
      

            if ($customer->update()) {
                return $this->formatResponse(true, 'Customer Information has been Updated successfully', 'admin.customer.list');
            }

            return $this->formatResponse(false, 'Unable to update Customer Information !', 'admin.customer.list');
    }

    public function delete($pk_no)
    {
        $customer = Customer::find($pk_no);
        $customer->is_active = 2;
        if ($customer->update()) {
            return $this->formatResponse(true, 'Successfully inactive Customer Information', 'admin.customer.list');
        }
        return $this->formatResponse(false,'Unable to inactive Customer Information','admin.customer.list');
    }
    public function active($pk_no)
    {
        $customer = Customer::find($pk_no);
        $customer->is_active = 1;
        if ($customer->update()) {
            return $this->formatResponse(true, 'Successfully active Customer Information', 'admin.customer.list');
        }
        return $this->formatResponse(false,'Unable to active Customer Information','admin.customer.list');
    }
}
