<?php

namespace App\Http\Controllers;

use App\Models\CouponController;
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

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCouponControllerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCouponControllerRequest $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CouponController  $couponController
     * @return \Illuminate\Http\Response
     */
    public function destroy(CouponController $couponController)
    {
        //
    }
}
