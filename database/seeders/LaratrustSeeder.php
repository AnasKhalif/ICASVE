<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use App\Models\OrganizingCommittee;

class LaratrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateLaratrustTables();

        $config = Config::get('laratrust_seeder.roles_structure');

        if ($config === null) {
            $this->command->error("The configuration has not been published. Did you run `php artisan vendor:publish --tag=\"laratrust-seeder\"`");
            $this->command->line('');
            return false;
        }

        $mapPermission = collect(config('laratrust_seeder.permissions_map'));

        foreach ($config as $key => $modules) {

            // Create a new role
            $role = Role::firstOrCreate([
                'name' => $key,
                'display_name' => ucwords(str_replace('_', ' ', $key)),
                'description' => ucwords(str_replace('_', ' ', $key))
            ]);
            $permissions = [];

            $this->command->info('Creating Role ' . strtoupper($key));

            // Reading role permission modules
            foreach ($modules as $module => $value) {

                foreach (explode(',', $value) as $perm) {

                    $permissionValue = $mapPermission->get($perm);

                    $permissions[] = Permission::firstOrCreate([
                        'name' => $module . '-' . $permissionValue,
                        'display_name' => ucfirst($permissionValue) . ' ' . ucfirst($module),
                        'description' => ucfirst($permissionValue) . ' ' . ucfirst($module),
                    ])->id;

                    $this->command->info('Creating Permission to ' . $permissionValue . ' for ' . $module);
                }
            }

            // Add all permissions to the role
            $role->permissions()->sync($permissions);

            if (Config::get('laratrust_seeder.create_users')) {
                $this->command->info("Creating '{$key}' user");
                // Create default user for each role
                $user = User::create([
                    'name' => ucwords(str_replace('_', ' ', $key)),
                    'email' => $key . '@app.test',
                    'password' => bcrypt('password')
                ]);
                $user->addRole($role);
            }
        }

        // Tambahkan Organizing Committee ke dalam database
        $this->seedOrganizingCommittee();
    }

    /**
     * Truncates all the laratrust tables and the users table
     *
     * @return  void
     */
    public function truncateLaratrustTables()
    {
        $this->command->info('Truncating User, Role and Permission tables');
        Schema::disableForeignKeyConstraints();

        DB::table('permission_role')->truncate();
        DB::table('permission_user')->truncate();
        DB::table('role_user')->truncate();

        if (Config::get('laratrust_seeder.truncate_tables')) {
            DB::table('roles')->truncate();
            DB::table('permissions')->truncate();

            if (Config::get('laratrust_seeder.create_users')) {
                $usersTable = (new User)->getTable();
                DB::table($usersTable)->truncate();
            }
        }

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Seed Organizing Committee Data
     *
     * @return void
     */
    private function seedOrganizingCommittee()
    {
        $this->command->info("Seeding Organizing Committee...");

        $data = [
            ['category' => 'Chairperson', 'name' => 'Dr. Patricia Audrey R., SH., M.Kn.', 'title' => 'Chairperson', 'institution' => null],
            ['category' => 'Vice Chairperson', 'name' => 'Dr.techn. Ir. Yusfan Adeputera Yusran, ST., MT.Ars., IPM., ASEAN Eng.', 'title' => 'Vice Chairperson', 'institution' => null],
            ['category' => 'Secretary', 'name' => 'Dr. Indah Dwi Qurbani, S.H., M.H.', 'title' => 'Secretary', 'institution' => null],
            ['category' => 'Secretary', 'name' => 'Felicia Nora Evelyn S.TP.', 'title' => 'Secretary', 'institution' => null],
            ['category' => 'Treasurer', 'name' => 'Henny Rosalinda, S.IP., M.A., Ph.D.', 'title' => 'Treasurer', 'institution' => null],
            ['category' => 'Scientific Publication', 'name' => 'Indah Yanti, S.Si., M.Si.', 'title' => 'Scientific Publication', 'institution' => null],
            ['category' => 'Event', 'name' => 'Dr.Agr.Sc. Dimas Firmanda Al Riza, ST., M.Sc.', 'title' => 'Event', 'institution' => null],
            ['category' => 'Hospitality', 'name' => 'Poespitasari Hazanah Ndaru, S.Pt., MP.', 'title' => 'Hospitality', 'institution' => null],
            ['category' => 'IT, Design & Technical Support', 'name' => 'Gema Adha Hermanenda, S.Kom.', 'title' => 'IT, Design & Technical Support', 'institution' => null],
        ];

        foreach ($data as $entry) {
            OrganizingCommittee::firstOrCreate($entry);
        }

        $this->command->info("Organizing Committee seeding completed.");
    }
}
