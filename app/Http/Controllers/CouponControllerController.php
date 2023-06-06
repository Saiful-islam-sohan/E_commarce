<?php

namespace App\Http\Controllers;

use App\Models\CouponController;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\StoreCouponControllerRequest;
use App\Http\Requests\UpdateCouponControllerRequest;

class CouponControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = CouponController::latest('id')->paginate(10);
        return view('backend.coupon.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCouponControllerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCouponControllerRequest $request)
    {
        CouponController::create([
            'coupon_name' => $request->coupon_name,
            'discount_amount' => $request->discount_amount,
            'minimum_purchase_amount' => $request->minimum_purchase_amount,
            'validity_till' => $request->validity_till,
        ]);

        Toastr::success('Data Stored Successfully!');
        return redirect()->route('coupon.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CouponController  $couponController
     * @return \Illuminate\Http\Response
     */
    public function show(CouponController $couponController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CouponController  $couponController
     * @return \Illuminate\Http\Response
     */
    public function edit(CouponController $couponController)
    {
        $coupon = CouponController::find($couponController);
        return view('backend.coupon.edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCouponControllerRequest  $request
     * @param  \App\Models\CouponController  $couponController
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCouponControllerRequest $request, CouponController $couponController)
    {
        $coupon = CouponController::find($couponController);
        $coupon->update([
            'coupon_name' => $request->coupon_name,
            'discount_amount' => $request->discount_amount,
            'minimum_purchase_amount' => $request->minimum_purchase_amount,
            'validity_till' => $request->validity_till,
            'is_active' => $request->filled('is_active'),
        ]);

        Toastr::success('Data Updated Successfully!');
        return redirect()->route('coupon.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CouponController  $couponController
     * @return \Illuminate\Http\Response
     */
    public function destroy(CouponController $couponController)
    {
        $coupon = CouponController::find($couponController)->delete();
        Toastr::success('Data Deleted Successfully!');
        return redirect()->route('coupon.index');
    }
}
