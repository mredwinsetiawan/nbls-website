<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_super_admin = new Role();
      $role_super_admin->name = 'SuperAdmin';
      $role_super_admin->description = '';
      $role_super_admin->save();

      $role_management = new Role();
      $role_management->name = 'Management';
      $role_management->description = '';
      $role_management->save();

      $role_expert = new Role();
      $role_expert->name = 'Expert';
      $role_expert->description = '';
      $role_expert->save();

      $role_instruktur = new Role();
      $role_instruktur->name = 'Instruktur';
      $role_instruktur->description = '';
      $role_instruktur->save();

      $role_murid = new Role();
      $role_murid->name = 'Murid';
      $role_murid->description = '';
      $role_murid->save();
      
    }
}
