<?php

use Illuminate\Database\Seeder;
/**
 * Description of UserTableSeeder
 *
 * @author arasm_000
 */
class UserTableSeeder extends Seeder {

    public function run() {
        $user = new App\User();
        $user->name = "Nick Simonis";
        $user->email = "arasmit_yamaui@hotmail.com";
        $user->password = Hash::make('changeme');
        $user->save();
    }

}
