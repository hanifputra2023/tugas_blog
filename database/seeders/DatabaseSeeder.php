<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat user sample
        $admin = User::create([
            'name' => 'Admin Blog',
            'email' => 'admin@blog.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $author = User::create([
            'name' => 'Penulis Blog',
            'email' => 'author@blog.com',
            'password' => bcrypt('password'),
            'role' => 'author',
        ]);

        // Buat kategori sample
        $tech = Category::create([
            'name' => 'Teknologi',
            'desc' => 'Artikel tentang teknologi dan programming',
        ]);

        $lifestyle = Category::create([
            'name' => 'Lifestyle',
            'desc' => 'Artikel tentang gaya hidup',
        ]);

        $tutorial = Category::create([
            'name' => 'Tutorial',
            'desc' => 'Tutorial dan panduan',
        ]);

        // Buat post sample
        Post::create([
            'title' => 'Mengenal Laravel Framework',
            'desc' => 'Panduan dasar tentang Laravel untuk pemula',
            'body' => 'Laravel adalah framework PHP yang sangat populer untuk pengembangan web. Framework ini menyediakan banyak fitur yang memudahkan developer dalam membangun aplikasi web yang robust dan scalable...',
            'user_id' => $admin->id,
            'cat_id' => $tech->id,
        ]);

        Post::create([
            'title' => 'Tips Produktivitas Programmer',
            'desc' => 'Cara meningkatkan produktivitas saat coding',
            'body' => 'Sebagai programmer, produktivitas adalah kunci sukses. Berikut beberapa tips yang bisa membantu meningkatkan produktivitas coding Anda: 1. Gunakan IDE yang tepat, 2. Pelajari keyboard shortcuts, 3. Buat workflow yang konsisten...',
            'user_id' => $author->id,
            'cat_id' => $lifestyle->id,
        ]);

        Post::create([
            'title' => 'Tutorial CRUD Laravel',
            'desc' => 'Belajar membuat operasi CRUD sederhana dengan Laravel',
            'body' => 'CRUD (Create, Read, Update, Delete) adalah operasi dasar dalam pengembangan aplikasi. Dalam tutorial ini, kita akan belajar cara membuat CRUD sederhana menggunakan Laravel...',
            'user_id' => $admin->id,
            'cat_id' => $tutorial->id,
        ]);
    }
}
