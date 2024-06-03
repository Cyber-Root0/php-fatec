<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer as CustomerModel;
/**
 * Customer
 */
class Customer extends Controller
{    
    /**
     * simple page renderization
     *
     * @return string
     */
    public function index(){
        $customers = CustomerModel::all();
        return view('index', compact('customers'));
    }    
    /**
     * Create a new register on table
     *
     * @param Request $request
     * @return string
     */
    public function create(Request $request){
        if ($request->getMethod() == "GET"){
            return view('create', []);
        }
        try{
            CustomerModel::create($this->map($request));
            return redirect('/');
        }catch(\Exception $e){
           return $e->getMessage();
        }
    }    
    /**
     * Delete register
     *
     * @param string $id
     * @return string
     */
    public function delete(string $id){
        $id = (int) $id;
        try{
            CustomerModel::destroy($id);
            return redirect('/');
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }    
    /**
     * Update register
     *
     * @param Request $request
     * @param int $id
     * @return string
     */
    public function update(Request $request, string $id){
        $id = (int) $id;
       if ($request->getMethod() == 'POST'){
            try{
                CustomerModel::where('id', $id)->update($this->map($request));
                return redirect('/');
            }catch(\Exception $e){
                return '';
            }
        }
        $customer = CustomerModel::find($id);
        return view('update', compact('customer'));
    }
}
