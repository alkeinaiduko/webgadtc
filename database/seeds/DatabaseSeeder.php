<?php

use Illuminate\Database\Seeder;
use App\Department;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Alkein',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        $departments = [
        	[
        		'dept_name' => "Department of Computer Studies",
	        	'dept_acro' => 'DCS',
	        	'created_at' => date("Y-m-d H:i:s"),
	            'updated_at' => date("Y-m-d H:i:s")
	        ],
	        [
        		'dept_name' => "Department of Arts and Sciences",
	        	'dept_acro' => 'DAS',
	        	'created_at' => date("Y-m-d H:i:s"),
	            'updated_at' => date("Y-m-d H:i:s")
	        ],
	        [
        		'dept_name' => "Department of Business",
	        	'dept_acro' => 'DOB',
	        	'created_at' => date("Y-m-d H:i:s"),
	            'updated_at' => date("Y-m-d H:i:s")
	        ],
            [
                'dept_name' => "Department of Teachers Education",
                'dept_acro' => 'DTE',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'dept_name' => "Department of Office Administration",
                'dept_acro' => 'DOA',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'dept_name' => "Department of Midwifery",
                'dept_acro' => 'DOM',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
        ];

        foreach($departments as $department) {
        	Department::create($department);
        }
    }
}
