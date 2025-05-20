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
        Schema::table('order_items', function (Blueprint $table) {
            $table->string('finishings')->nullable()->after('pickup_option');
            $table->string('thickness')->nullable()->after('finishings');
            $table->string('wirestakesqtys')->nullable()->after('thickness');
            $table->string('framesizes')->nullable()->after('wirestakesqtys');
            $table->string('displaytypes')->nullable()->after('framesizes');
            $table->string('installations')->nullable()->after('displaytypes');
            $table->string('materials')->nullable()->after('installations');
            $table->string('corners')->nullable()->after('materials');
            $table->string('applications')->nullable()->after('corners');
            $table->string('paperthickness')->nullable()->after('applications');
            $table->string('copiesrequireds')->nullable()->after('paperthickness');
            $table->string('pagesinnotepads')->nullable()->after('copiesrequireds');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropColumn([
                'finishings', 'thickness', 'wirestakesqtys', 'framesizes', 'displaytypes', 'installations', 
                'materials', 'corners', 'applications', 'paperthickness', 'copiesrequireds', 'pagesinnotepads'
            ]);
        });
    }
};
