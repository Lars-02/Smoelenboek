<?php
 
namespace Tests\Browser\TestPreparations;

use Illuminate\Support\Facades\Artisan;

class DatabasePreparer {
 
    public static function migrate_seed_database() {
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');
    }
 
}