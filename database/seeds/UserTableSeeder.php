<?php

use Illuminate\Database\Seeder;
use SilverDC\Role;
use SilverDC\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->newUser("Super Admin Test", "superadmin@mail.com", "superadminP4ss", "SuperAdmin");
        $this->newUser("Admin Test", "admin@mail.com", "adminP4ss", "Admin");
        $this->newUser("Seccional Test", "seccional@mail.com", "seccionalP4ss", "Seccional");
        $this->newUser("Supervisor Test", "supervisor@mail.com", "supervisorP4ss", "Supervisor");
        $this->newUser("Polvorinero Test", "polvorinero@mail.com", "polvorineroP4ss", "Polvorinero");
    }

    private function newUser($name, $email, $password, $role) {
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->role = $role;
        $user->save();
    }
}
