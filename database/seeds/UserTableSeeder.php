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
        $this->newUser("J.Chipana", "operador01@mail.com", "operadorP4ss", "Operador");
        $this->newUser("I.Huayta", "operador02@mail.com", "operadorP4ss", "Operador");
        $this->newUser("E.Dorado", "operador03@mail.com", "operadorP4ss", "Operador");
        $this->newUser("M.Flores", "operador04@mail.com", "operadorP4ss", "Operador");
        $this->newUser("E.Choque", "operador05@mail.com", "operadorP4ss", "Operador");
        $this->newUser("R.Juarez", "operador06@mail.com", "operadorP4ss", "Operador");
        $this->newUser("P. Gama", "operador07@mail.com", "operadorP4ss", "Operador");
        $this->newUser("G. Figueroa", "operador08@mail.com", "operadorP4ss", "Operador");
        $this->newUser("E. Mendoza", "operador09@mail.com", "operadorP4ss", "Operador");
        $this->newUser("E. Limachi", "operador10@mail.com", "operadorP4ss", "Operador");
        $this->newUser("G. Condori", "operador11@mail.com", "operadorP4ss", "Operador");
        $this->newUser("A. Coria", "operador12@mail.com", "operadorP4ss", "Operador");
        $this->newUser("S. Moraño", "operador13@mail.com", "operadorP4ss", "Operador");
        $this->newUser("R. Paucara", "operador14@mail.com", "operadorP4ss", "Operador");
        $this->newUser("N. Calcina", "operador15@mail.com", "operadorP4ss", "Operador");
        $this->newUser("W. Felix", "operador16@mail.com", "operadorP4ss", "Operador");
        $this->newUser("S. Lozano", "operador17@mail.com", "operadorP4ss", "Operador");
        $this->newUser("A. Torrez", "operador18@mail.com", "operadorP4ss", "Operador");
        $this->newUser("A. Pabon", "operador19@mail.com", "operadorP4ss", "Operador");
        $this->newUser("P. Donaire", "operador20@mail.com", "operadorP4ss", "Operador");
        $this->newUser("L. Ventura", "operador21@mail.com", "operadorP4ss", "Operador");
        
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
