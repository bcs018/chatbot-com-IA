<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('webhook_eventos', function (Blueprint $table) {
            $table->id();
            // ID único do evento enviado pelo Asaas
            $table->string('evento_id')->unique();

            // Ex.: PAYMENT_CONFIRMED, PAYMENT_RECEIVED
            $table->string('tipo_evento')->index();

            // ID da cobrança no Asaas, quando existir
            $table->string('gateway_payment_id')->nullable()->index();

            // ID da assinatura no Asaas, quando existir
            $table->string('gateway_subscription_id')->nullable()->index();

            // JSON original recebido
            $table->json('payload');

            // recebido, processando, processado, erro
            $table->string('status')->default('recebido')->index();

            $table->unsignedInteger('tentativas')->default(0);

            $table->text('erro')->nullable();

            $table->timestamp('recebido_em')->useCurrent();
            $table->timestamp('processado_em')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webhook_eventos');
    }
};
