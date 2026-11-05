<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoehAccessSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Define NOEH roles
        $roles = [
            [
                'role_name' => 'Super Admin',
                'slug' => 'super-admin',
                'description' => 'Full control over the entire NOEH platform.',
            ],
            [
                'role_name' => 'System Administrator',
                'slug' => 'system-administrator',
                'description' => 'Manages technical operations and system security.',
            ],
            [
                'role_name' => 'Content Administrator',
                'slug' => 'content-administrator',
                'description' => 'Manages educational content across the platform.',
            ],
            [
                'role_name' => 'Verification Administrator',
                'slug' => 'verification-administrator',
                'description' => 'Reviews and verifies submitted information.',
            ],
            [
                'role_name' => 'Institution Administrator',
                'slug' => 'institution-administrator',
                'description' => 'Manages the assigned educational institution.',
            ],
            [
                'role_name' => 'School Staff / Editor',
                'slug' => 'school-staff',
                'description' => 'Assists with managing assigned institution content.',
            ],
            [
                'role_name' => 'Registered User',
                'slug' => 'registered-user',
                'description' => 'Uses registered user features.',
            ],
        ];

        foreach ($roles as $role) {
            DB::table('roles')->updateOrInsert(
                ['slug' => $role['slug']],
                [
                    'role_name' => $role['role_name'],
                    'description' => $role['description'],
                    'is_system_role' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        // 2. Define system permissions
        $permissions = [
            'view-dashboard' => ['View Dashboard', 'Access the dashboard.'],
            'manage-users' => ['Manage Users', 'Create and manage user accounts.'],
            'manage-roles' => ['Manage Roles', 'Manage system roles.'],
            'manage-permissions' => ['Manage Permissions', 'Manage system permissions.'],
            'manage-settings' => ['Manage Settings', 'Manage platform configuration.'],
            'view-activity-logs' => ['View Activity Logs', 'View system activity records.'],
            'view-reports' => ['View Reports', 'Access platform reports.'],

            'view-institutions' => ['View Institutions', 'View educational institutions.'],
            'create-institutions' => ['Create Institutions', 'Add educational institutions.'],
            'update-institutions' => ['Update Institutions', 'Edit institution information.'],
            'delete-institutions' => ['Delete Institutions', 'Remove institution records.'],

            'manage-campuses' => ['Manage Campuses', 'Manage campus information.'],
            'manage-programs' => ['Manage Programs', 'Manage academic programs.'],
            'manage-admissions' => ['Manage Admissions', 'Manage admission information.'],
            'manage-scholarships' => ['Manage Scholarships', 'Manage scholarship information.'],
            'manage-announcements' => ['Manage Announcements', 'Manage platform announcements.'],

            'submit-verification' => ['Submit Verification', 'Submit information for verification.'],
            'review-verification' => ['Review Verification', 'Review submitted information.'],
            'approve-verification' => ['Approve Verification', 'Approve submitted information.'],
            'reject-verification' => ['Reject Verification', 'Reject submitted information.'],

            'manage-institution-users' => ['Manage Institution Users', 'Manage staff of an assigned institution.'],
            'manage-own-institution' => ['Manage Own Institution', 'Manage the assigned institution only.'],

            'manage-own-profile' => ['Manage Own Profile', 'Edit personal account information.'],
            'manage-favorites' => ['Manage Favorites', 'Save and manage favorite institutions.'],
            'manage-comparisons' => ['Manage Comparisons', 'Save and manage institution comparisons.'],
            'manage-saved-scholarships' => ['Manage Saved Scholarships', 'Save scholarship opportunities.'],
        ];

        foreach ($permissions as $slug => $permission) {
            DB::table('permissions')->updateOrInsert(
                ['slug' => $slug],
                [
                    'permission_name' => $permission[0],
                    'description' => $permission[1],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        // 3. Get database IDs
        $roleIds = DB::table('roles')->pluck('id', 'slug');
        $permissionIds = DB::table('permissions')->pluck('id', 'slug');

        // 4. Define permissions for each role
        $rolePermissions = [
            'super-admin' => array_keys($permissions),

            'system-administrator' => [
                'view-dashboard',
                'manage-users',
                'manage-roles',
                'manage-permissions',
                'manage-settings',
                'view-activity-logs',
                'view-reports',
            ],

            'content-administrator' => [
                'view-dashboard',
                'view-institutions',
                'create-institutions',
                'update-institutions',
                'manage-campuses',
                'manage-programs',
                'manage-admissions',
                'manage-scholarships',
                'manage-announcements',
                'view-reports',
            ],

            'verification-administrator' => [
                'view-dashboard',
                'view-institutions',
                'review-verification',
                'approve-verification',
                'reject-verification',
                'view-reports',
            ],

            'institution-administrator' => [
                'view-dashboard',
                'view-institutions',
                'manage-own-institution',
                'manage-campuses',
                'manage-programs',
                'manage-admissions',
                'manage-scholarships',
                'manage-announcements',
                'manage-institution-users',
                'submit-verification',
                'view-reports',
            ],

            'school-staff' => [
                'view-dashboard',
                'view-institutions',
                'manage-own-institution',
                'manage-programs',
                'manage-admissions',
                'manage-scholarships',
                'manage-announcements',
                'submit-verification',
            ],

            'registered-user' => [
                'view-dashboard',
                'manage-own-profile',
                'manage-favorites',
                'manage-comparisons',
                'manage-saved-scholarships',
            ],
        ];

        // 5. Assign permissions to roles
        foreach ($rolePermissions as $roleSlug => $permissionSlugs) {
            foreach ($permissionSlugs as $permissionSlug) {
                DB::table('role_permissions')->insertOrIgnore([
                    'role_id' => $roleIds[$roleSlug],
                    'permission_id' => $permissionIds[$permissionSlug],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
