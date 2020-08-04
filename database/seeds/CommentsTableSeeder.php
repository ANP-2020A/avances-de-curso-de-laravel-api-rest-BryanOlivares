<?php

use App\User;
use App\Article;
use App\Comment;
use Illuminate\Database\Seeder;


use App\Comment;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;
21-resources

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciamos la tabla comments
        Comment::truncate();
        $faker = \Faker\Factory::create();
        // Obtenemos todos los artículos de la bdd
        $articles = App\Article::all();
        // Obtenemos todos los usuarios
        $users = App\User::all();
        foreach ($users as $user) {

        // iniciamos sesión con cada uno
            JWTAuth::attempt(['email' => $user->email, 'password' => '123123']);
        // Creamos un comentario para cada artículo con este usuario

            // iniciamos sesión con cada uno
            JWTAuth::attempt(['email' => $user->email, 'password' => '123123']);
            // Creamos un comentario para cada artículo con este usuario
 21-resources
            foreach ($articles as $article) {
                Comment::create([
                    'text' => $faker->paragraph,
                    'article_id' => $article->id,
                ]);
            }
        }
    }
}
