<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'pp_pkb', 'pp_pkb_confirm', 'pp_pkb_remarks', 'validuntil', 'validuntil_confirm', 'validuntil_remarks',
        'compensation', 'compensation_confirm', 'compensation_remarks_mod', 'compensation_remarks_client', 'sev_svc', 'sev_svc_confirm',
        'sev_svc_remarks_mod', 'sev_svc_remarks_client', 'offset', 'offset_confirm', 'offset_remarks', 'pensiun', 'pensiun_confirm',
        'pensiun_remarks', 'tambahan', 'tambahan_confirm', 'tambahan_remarks', 'resign', 'resign_confirm', 'resign_remarks', 'death',
        'death_confirm', 'death_remarks', 'disability', 'disability_confirm', 'disablity_remarks', 'pensiun_baru', 'pensiun_baru_confirm',
        'pensiun_baru_remarks', 'disability_baru', 'disability_baru_confirm', 'disablity_baru_remarks', 'offset_pensiun',
        'offset_pensiun_remarks', 'offset_resign', 'offset_resign_remarks', 'offset_death', 'offset_death_remarks', 'offset_disability',
        'offset_disability_remarks', 'action_plan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
