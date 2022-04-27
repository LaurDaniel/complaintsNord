<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Complaint extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const TIP_CLIENT_SELECT = [
        'Casnic'     => 'Casnic',
        'Non-casnic' => 'Non-casnic',
    ];

    public const CONCLUZIA_ANALIZARII_SELECT = [
        'Intemeiata'    => 'Intemeiata',
        'Neintemeiata'  => 'Neintemeiata',
        'Nesolutionata' => 'Nesolutionata',
    ];

    public const MODUL_PRELUARE_SELECT = [
        'E-mail'          => 'E-mail',
        'Telefon'         => 'Telefon',
        'Formular Online' => 'Formular Online',
        'Posta'           => 'Posta',
        'Fax'             => 'Fax',
    ];

    public $table = 'complaints';

    protected $dates = [
        'data_intrare',
        'termen',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'numar_intrare',
        'data_intrare',
        'modul_preluare',
        'localitate',
        'reclamant',
        'tip_client',
        'tip_document',
        'continut',
        'concluzia_analizarii',
        'masuri',
        'termen',
        'date_contact',
        'responsabil',
        'raspuns',
        'fisier',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        Complaint::observe(new \App\Observers\ComplaintActionObserver());
    }

    public function getDataIntrareAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDataIntrareAttribute($value)
    {
        $this->attributes['data_intrare'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getTermenAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTermenAttribute($value)
    {
        $this->attributes['termen'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
