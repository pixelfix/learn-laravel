<?php

use App\Models\Role;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Role::factory()->create(['name' => 'Administrator']);
        Role::factory()->create(['name' => 'User']);

        User::factory(10)->create();

        Setting::factory()->create(['key' => 'default_from', 'value' => 'admin@pixelfix.net.au']);
        Setting::factory()->create(['key' => 'week_days', 'value' => 'Monday,Tuesday,Wednesday,Thursday,Friday']);
        Setting::factory()->create(['key' => 'application_url', 'value' => 'https://www.pixelfix.net.au']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            //
        });
    }
};
