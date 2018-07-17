<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDefaultRoleTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER user_default_role_tr AFTER INSERT ON `users` FOR EACH ROW
            BEGIN
                INSERT INTO role_user (`role_id`, `user_id`, `created_at`, `updated_at`) 
                VALUES (1, NEW.id, now(), null);
            END
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER `user_default_role_tr`');
    }
}
