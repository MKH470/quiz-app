<?php

use Illuminate\Database\Seeder;
use App\User;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name="admin3";
        $admin->email="admin12345@gmail.com";
        $admin->password =  bcrypt('12345678');
        $admin->visible_password ="12345678";
        $admin->email_verified_at = NOW();
        $admin->occupation="CEO";
        $admin->address="scheltemaheer8,9736AH Groningen";
        $admin->phone="003165453494";
        $admin->is_admin=1;
        $admin->save();
    }
}
