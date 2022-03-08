<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('pp_pkb');
            $table->string('pp_pkb_confirm')->nullable();
            $table->string('pp_pkb_remarks')->nullable();
            $table->string('validuntil');
            $table->string('validuntil_confirm')->nullable();
            $table->string('validuntil_remarks')->nullable();
            $table->string('compensation');
            $table->string('compensation_confirm')->nullable();
            $table->string('compensation_remarks_mod')->nullable();
            $table->string('compensation_remarks_client')->nullable();
            $table->string('sev_svc');
            $table->string('sev_svc_confirm')->nullable();
            $table->string('sev_svc_remarks_mod')->nullable();
            $table->string('sev_svc_remarks_client')->nullable();
            $table->string('offset');
            $table->string('offset_confirm')->nullable();
            $table->string('offset_remarks')->nullable();
            $table->string('pensiun');
            $table->string('pensiun_confirm')->nullable();
            $table->string('pensiun_remarks')->nullable();
            $table->string('tambahan');
            $table->string('tambahan_confirm')->nullable();
            $table->string('tambahan_remarks')->nullable();
            $table->string('resign');
            $table->string('resign_confirm')->nullable();
            $table->string('resign_remarks')->nullable();
            $table->string('death');
            $table->string('death_confirm')->nullable();
            $table->string('death_remarks')->nullable();
            $table->string('disability');
            $table->string('disability_confirm')->nullable();
            $table->string('disablity_remarks')->nullable();
            $table->string('pensiun_baru');
            $table->string('pensiun_baru_confirm')->nullable();
            $table->string('pensiun_baru_remarks')->nullable();
            $table->string('disability_baru');
            $table->string('disability_baru_confirm')->nullable();
            $table->string('disablity_baru_remarks')->nullable();
            $table->string('offset_pensiun');
            $table->string('offset_pensiun_remarks')->nullable();
            $table->string('offset_resign');
            $table->string('offset_resign_remarks')->nullable();
            $table->string('offset_death');
            $table->string('offset_death_remarks')->nullable();
            $table->string('offset_disability');
            $table->string('offset_disability_remarks')->nullable();
            $table->string('action_plan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data');
    }
}
