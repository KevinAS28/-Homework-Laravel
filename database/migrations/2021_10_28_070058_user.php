<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('level')->default('user');
            $table->string('name');
            $table->string('email');
            $table->dateTime('email_verified_at')->default(now());
            // $table->string('email_verified_at');
            $table->string('password');
            $table->string('remember_token')->default(Str::random(10));
            $table->timestamps();

        });
        // 'name' => $this->faker->name(),
        // 'email' => $this->faker->unique()->safeEmail(),
        // 'email_verified_at' => now(),
        // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        // 'remember_token' => Str::random(10),
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
