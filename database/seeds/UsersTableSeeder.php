<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'name' => 'admin',
            'email' => 'admin@blog.com',
            'password' => bcrypt('password'),
            'admin' => 1
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'https://www.gravatar.com/avatar/e114468b5818d555154bc42fad63e946',
            'about' => 'This is the admin account',
            'facebook' => 'https://www.facebook.com/joaofnds/',
            'youtube' => 'https://www.youtube.com/user/Joaovitor950/',
            'twitter' => 'https://www.twitter.com/joaofnds/'
        ]);
    }
}
