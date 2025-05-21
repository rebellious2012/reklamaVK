<?php

namespace App\Services\Admin\Stages;
use App\Models\Payment;
use App\Models\PaymentUser;

class PaymentService
{
    public function storePaymentData($request)
    {
        //dd($request);
        // Создаем запись в payments
//        $payment = Payment::create([
//            'note' => $request->input('payment.note'),
//        ]);

        // Создаем запись в payment_user
        PaymentUser::create([
            'user_id' => $request->user_id,
            'payment_id' => $request->payment_id,
            'stage_id' => $request->stage_id,
            'stage' => $request->stage,
            'form_id' => $request->form_id,
            'amount' => $request->amount,
            'status' => $request->status,
            'note' => $request->input('payment_user.note'),
            'image_path' => $request->image_path,
        ]);
    }
}