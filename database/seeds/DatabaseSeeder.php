<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $name = env('ADMIN_NAME');
        $email = env('ADMIN_EMAIL');
        $password = bcrypt(env('ADMIN_PASSWORD'));

        if (empty($name) || empty($password) || empty($email)) {
            dd('Name or password is empty in .env');
        }

        \Illuminate\Support\Facades\DB::beginTransaction();
        try {
            $user = \App\User::create([
                'name' => $name,
                'login' => $name,
                'email' => $email,
                'email_verified_at' => now(),
                'password' => $password
            ]);

            \App\Models\Role::create([
                'user_id' => $user->id,
                'role' => \App\User::ROLE_ADMIN
            ]);

            \App\Models\Setting::create([
                'meta_title->ru' => 'Sinoward'
            ]);

            \Illuminate\Support\Facades\DB::commit();
        } catch (\Exception $exception) {
            \Illuminate\Support\Facades\DB::rollBack();
            throw new DomainException($exception->getMessage());
        }
    }
}
