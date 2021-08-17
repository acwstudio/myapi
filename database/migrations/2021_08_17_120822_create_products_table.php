<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_moderated')->default(false);
            $table->boolean('published');
            $table->dateTime('expiration_date');
            $table->string('name');
            $table->string('slug');
            $table->text('preview_image')->nullable();
            $table->text('digital_image')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->boolean('is_employment')->default(false);
            $table->boolean('is_installment')->default(false);
            $table->integer('installment_months')->nullable();
            $table->smallInteger('document')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('organization_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
