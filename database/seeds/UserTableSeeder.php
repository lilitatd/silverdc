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
        $role_superAdmin = $this->getRole("SuperAdmin");
        $role_admin = $this->getRole("Admin");
        $role_seccional = $this->getRole("Seccional");
        $role_supervisor = $this->getRole("Supervisor");
        $role_polvorinero = $this->getRole("Polvorinero");

        $this->newUser("Super Admin Test", "superadmin@mail.com", "superadminP4ss", $role_superAdmin);
        $this->newUser("Admin Test", "admin@mail.com", "adminP4ss", $role_admin);
        $this->newUser("Seccional Test", "seccional@mail.com", "seccionalP4ss", $role_seccional);
        $this->newUser("Supervisor Test", "supervisor@mail.com", "supervisorP4ss", $role_supervisor);
        $this->newUser("Polvorinero Test", "polvorinero@mail.com", "polvorineroP4ss", $role_polvorinero);
    }

    private function getRole($role) {
        return Role::where('name', $role)->first();
    }

    private function newUser($name, $email, $password, $role) {
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->save();
        $user->roles()->attach($role);
    }
}
