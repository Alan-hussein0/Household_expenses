<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\ProductResouce;
use App\Models\AccountPages;
use App\Models\Except;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;

class ProductController extends BaseController
{

    public function index()
    {
        $product = Product::all();
        return $this->sendResponse(ProductResouce::collection($product),'product retreived successfully');
    }



    public function store(Request $request)
    {
        $input = $request->except('except');
        $validator = Validator::make($input,[
            'name' => 'required',
            'price' => 'required',
            'amount' => 'required'
        ]);


        if ($validator->fails()) {
            return $this->sendError('Validat error',$validator->errors());
        }


        $input['user_id'] = Auth::id();
        $input['account_pages_id'] = AccountPages::whereNull('reckoning')->first()->id;
        $input['calculated'] = $input['price']*$input['amount'];

        $product = Product::create($input);

        return $this->sendResponse(new ProductResouce($product),'The product add successfully');

    }


    public function show(Product $product)
    {
        //
    }


    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product,User $user)
    {
        $errorMessage = [];

        if ($user->id != Auth::id()) {
            return $this->sendError('you do not have right',$errorMessage);
        }

        $product->delete();
        return $this->sendResponse(new ProductResouce($product),'the product deleted successfully!');
    }
}
