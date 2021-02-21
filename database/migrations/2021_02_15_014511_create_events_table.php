<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('title');
            $table->string('slug');
            $table->enum('category', ['programming', 'desain', 'videografi', 'puisi', 'memasak']);
            $table->string('thumbnail');
            $table->text('desc');
            $table->integer('max_user');
            $table->integer('total_prize')->nullable();
            $table->date('closed_at');
            $table->string('payment')->nullable();
            $table->enum('paid_off', ['failed', 'pending', 'success']);
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
        Schema::dropIfExists('events');
    }
}
