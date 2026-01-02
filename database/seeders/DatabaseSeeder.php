<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Create a sample company
        $company = Company::updateOrCreate(
            ['email' => 'demo@goldfleet.com'],
            [
                'name' => 'Gold Fleet Demo Company',
                'email' => 'demo@goldfleet.com',
                'phone' => '+1-555-0123',
                'address' => '123 Fleet Street, Demo City, DC 12345',
                'status' => 'active',
            ]
        );

        // Create system super admin
        $admin = User::updateOrCreate(
            ['email' => 'admin@goldfleet.com'],
            [
                'name' => 'System Admin',
                'password' => Hash::make('password'),
                'company_id' => null,
                'email_verified_at' => now(),
            ]
        );

        $admin->update(['role' => 'super_admin']);

        // Create company admin
        $companyAdmin = User::updateOrCreate(
            ['email' => 'admin@demo.com'],
            [
                'name' => 'Company Admin',
                'password' => Hash::make('password'),
                'company_id' => $company->id,
                'email_verified_at' => now(),
            ]
        );
        $companyAdmin->update(['role' => 'company_admin']);

        // Create regular user
        User::updateOrCreate(
            ['email' => 'user@demo.com'],
            [
                'name' => 'Fleet Manager',
                'email' => 'user@demo.com',
                'password' => Hash::make('password'),
                'company_id' => $company->id,
                'role' => 'fleet_manager',
                'email_verified_at' => now(),
            ]
        );

        // Update existing test user if exists
        $testUser = User::where('email', 'test@example.com')->first();
        if ($testUser) {
            $testUser->update(['company_id' => $company->id, 'role' => 'driver']);
        }
    }
}
