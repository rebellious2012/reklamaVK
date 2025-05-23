<?php



namespace App\Models;



// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Stage;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;

use App\Models\Account;

use App\Models\Step;



class User extends Authenticatable

{

    use HasFactory, Notifiable;



    /**

     * The attributes that are mass assignable.

     *

     * @var array<int, string>

     */

    protected $fillable = [

        'name',

        'email',

        'password',

    ];

    public $with = ['stages', 'steps', 'forms'];



    /**

     * The attributes that should be hidden for serialization.

     *

     * @var array<int, string>

     */

    protected $hidden = [

        'password',

        'remember_token',

    ];



    /**

     * Get the attributes that should be cast.

     *

     * @return array<string, string>

     */

    protected function casts(): array

    {

        return [

            'email_verified_at' => 'datetime',

            'password'          => 'hashed',

        ];

    }



    public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany

    {

        return $this->belongsToMany(Role::class);

    }
    public function userIntroForm(): \Illuminate\Database\Eloquent\Relations\HasOne

    {

        return $this->hasOne(UserIntroForm::class);

    }


    public function account(): \Illuminate\Database\Eloquent\Relations\HasOne

    {

        return $this->hasOne(Account::class);

    }



    // public function stages()

    // {

    //     return $this->belongsToMany(Stage::class)->withPivot('status', 'price')->withTimestamps();

    // }

    public function stages()
    {
        return $this->belongsToMany(Stage::class)->withPivot('status', 'price', 'bank_name', 'account_number', 'payment_purpose')->withTimestamps();
    }

    // Связь "многие ко многим" для шагов

    public function steps()

    {

        return $this->belongsToMany(Step::class)->withTimestamps();

    }



    public function hasStep($stageId, $stepId)

    {

        return $this->stages()->wherePivot('stage_id', $stageId)->steps()->contains($stepId);

    }



    public function stepUsers()

    {

        return $this->hasMany(StepUser::class);

    }



    // Отношение "пользователь - формы" через промежуточную таблицу step_user

    public function forms()

    {

        return $this->hasManyThrough(Form::class, StepUser::class, 'user_id', 'step_user_id', 'id', 'id');

    }



    public function activeStepUsers()

    {

        return $this->stepUsers()->where('status', 'active')->first();

    }



    public function activeStep()

    {

        if ($this->activeStepUsers()) {

            return $this->activeStepUsers()->step();

        }



        return null;

    }



    public function payments()

    {

        return $this->belongsToMany(Payment::class, 'payment_user')

            ->using(PaymentUser::class)

            ->withPivot('amount', 'status', 'note', 'image_path', 'stage')

            ->withTimestamps();

    }



    public function userPaymentsTotalAmount()

    {

        // Получаем платежи пользователя

        $userPayments = $this->payments;



        // Инициализируем массив для хранения данных о платежах

        $paymentsData = [];



        // Проверяем, есть ли платежи

        if (!$userPayments->isEmpty()) {

            foreach ($userPayments as $payment) {

                $paymentsData[] = [

                    'id'     => $payment->id, // ID платежа

                    'amount' => $payment->pivot->amount, // Сумма

                    'date'   => $payment->pivot->created_at->toDateString(), // Дата

                    'time'   => $payment->pivot->created_at->toTimeString(), // Время

                    'stage'  => $payment->pivot->stage, // Этап платежа (если это поле существует)

                ];

            }

        }



        // Проверяем, есть ли платежи, и вычисляем сумму

        $totalAmount = $userPayments->isEmpty() ? 0 : $userPayments->sum('pivot.amount');



        // Возвращаем объект с платежами и общей суммой

        return [

            'userPayments' => $paymentsData,

            'totalAmount'  => $totalAmount,

        ];

    }
    public function cancels()
    {
        return $this->hasMany(Cancel::class);
    }
}
