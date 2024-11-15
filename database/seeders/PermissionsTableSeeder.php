<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'certificate_create',
            ],
            [
                'id'    => 18,
                'title' => 'certificate_edit',
            ],
            [
                'id'    => 19,
                'title' => 'certificate_show',
            ],
            [
                'id'    => 20,
                'title' => 'certificate_delete',
            ],
            [
                'id'    => 21,
                'title' => 'certificate_access',
            ],
            [
                'id'    => 22,
                'title' => 'blog_create',
            ],
            [
                'id'    => 23,
                'title' => 'blog_edit',
            ],
            [
                'id'    => 24,
                'title' => 'blog_show',
            ],
            [
                'id'    => 25,
                'title' => 'blog_delete',
            ],
            [
                'id'    => 26,
                'title' => 'blog_access',
            ],
            [
                'id'    => 27,
                'title' => 'video_create',
            ],
            [
                'id'    => 28,
                'title' => 'video_edit',
            ],
            [
                'id'    => 29,
                'title' => 'video_show',
            ],
            [
                'id'    => 30,
                'title' => 'video_delete',
            ],
            [
                'id'    => 31,
                'title' => 'video_access',
            ],
            [
                'id'    => 32,
                'title' => 'image_create',
            ],
            [
                'id'    => 33,
                'title' => 'image_edit',
            ],
            [
                'id'    => 34,
                'title' => 'image_show',
            ],
            [
                'id'    => 35,
                'title' => 'image_delete',
            ],
            [
                'id'    => 36,
                'title' => 'image_access',
            ],
            [
                'id'    => 37,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
