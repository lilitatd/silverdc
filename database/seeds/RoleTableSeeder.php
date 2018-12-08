<?php

use Illuminate\Database\Seeder;
use SilverDC\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $this->newRole("SuperAdmin", "Super Administrador");
        $this->newRole("Admin", "Administrador");
        $this->newRole("Seccional", "Seccional");
        $this->newRole("Supervisor", "Supervisor");
        $this->newRole("Polvorinero", "Polvorinero");
    }

    private function newRole($name, $description) {
        $role = new Role();
        $role->name = $name;
        $role->description = $description;
        $role->save();
    }
}
