<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use App\Models\PaymentUser;
use Illuminate\Http\Request;
use App\Http\Requests\PaymentRequest;

class PaymentController extends Controller
{
    /**
     * Store a newly created payment in storage.
     */
    public function store(PaymentRequest $request)
    {
        // Создаем платеж в таблице payments
        $payment = Payment::create([
            'note' => $request->input('payment.note'),
        ]);

        // Создаем запись в payment_user через модель PaymentUser
        PaymentUser::create([
            'user_id' => $request->user_id,
            'payment_id' => $payment->id,
            'stage_id' => $request->stage_id,
            'form_id' => $request->form_id,
            'amount' => $request->amount,
            'status' => $request->status,
            'note' => $request->input('payment_user.note'),
            'image_path' => $request->image_path,
        ]);

        return redirect()->route('payments.index')->with('success', 'Платеж успешно создан.');
    }

    /**
     * Update the specified payment in storage.
     */
    public function update(PaymentRequest $request, Payment $payment)
    {
        // Обновляем информацию о платеже в таблице payments
        $payment->update([
            'note' => $request->input('payment.note'),
        ]);

        // Обновляем запись в payment_user через модель PaymentUser
        PaymentUser::where('payment_id', $payment->id)
            ->where('user_id', $request->user_id)  // Это важно для уникальной записи
            ->update([
                'stage_id' => $request->stage_id,
                'form_id' => $request->form_id,
                'amount' => $request->amount,
                'status' => $request->status,
                'note' => $request->input('payment_user.note'),
                'image_path' => $request->image_path,
            ]);

        return redirect()->route('payments.index')->with('success', 'Платеж успешно обновлен.');
    }

    /**
     * Remove the specified payment from storage.
     */
    public function destroy(Payment $payment)
    {
        // Удаляем платеж и его запись в payment_user
        PaymentUser::where('payment_id', $payment->id)->delete();

        $payment->delete();

        return redirect()->route('payments.index')->with('success', 'Платеж успешно удален.');
    }
}