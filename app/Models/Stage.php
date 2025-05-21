<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Scopes\OrderByPositionScope;

class Stage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        "group_name",
        "price",
        'short_content',
        'description',
        'position',
        'color',
        'svg_code',
        "slug",
        "status",
    ];
    public $with = ['steps'];

    public static function boot()
    {
        parent::boot();
        // Логика создания
        static::creating(function ($stage) {
            self::generateUniqueSlug($stage);
        });

        // Логика обновления
        static::updating(function ($stage) {
                self::generateUniqueSlug($stage);
        });

        // Логика удаления связанных записей
        static::deleting(function ($stage) {
            // Удаление всех связанных записей с steps (stage_step)
            $stage->steps()->detach();

            // Удаление всех "висячих" записей из stage_step при удалении Stage
            DB::table('stage_step')
                ->whereNotExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('steps')
                        ->whereRaw('steps.id = stage_step.step_id');
                })
                ->orWhereNotExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('stages')
                        ->whereRaw('stages.id = stage_step.stage_id');
                })
                ->delete();

            // Удаление всех связей с пользователями (stage_user или аналогичная таблица)
            $stage->users()->detach();
        });
    }
    // ordering
    protected static function booted()
    {
        static::addGlobalScope(new OrderByPositionScope());
    }
    // Метод для генерации уникального slug
    protected static function generateUniqueSlug($stage)
    {
        $slug = Str::slug($stage->name, '_');
        $originalSlug = $slug;
        $count = 1;

        // Проверяем, существует ли такой slug
        if (self::where('slug', $slug)->exists()) {
            // Добавляем group_name к slug, если он существует, иначе просто добавляем счетчик
            if (!empty($stage->group_name)) {
                $slug = $originalSlug . '_' . Str::slug($stage->group_name, '_');
            } else {
                $slug = $originalSlug . '_' . $count++;
            }
        }

        $stage->slug = $slug;
    }

    public function steps()
    {
        return $this->belongsToMany(Step::class, 'stage_step', 'stage_id', 'step_id')->withPivot('position')->withTimestamps();
    }
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('status', 'price', 'bank_name', 'account_number');
    }
    public function payments()
    {
        return $this->belongsToMany(Payment::class, 'payment_stage', 'stage_id', 'payment_id')->using(PaymentStage::class)->withTimestamps();
    }

    // Связь с PaymentStage
    public function paymentStages()
    {
        return $this->belongsToMany(PaymentStage::class, 'payment_stage')
            ->withTimestamps();
    }

    // Связь с Field через PaymentStage
    public function fields()
    {
        return $this->belongsToMany(Field::class, 'payment_stage', 'stage_id', 'field_id')->using(PaymentStage::class)
            ->withTimestamps();
    }
}
