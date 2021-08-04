<?php

namespace Database\Seeders;
use App\Models\Author;
use Illuminate\Database\Seeder;
//use phpDocumentor\Reflection\DocBlock\Tags\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author = new Author();
        $author->name = 'Nguyen Nhat Anh';
        $author->save();

        $author = new Author();
        $author->name = 'Fuyuhara Patora';
        $author->save();

        $author = new Author();
        $author->name = 'Authur Conan Doyle';
        $author->save();

        $author = new Author();
        $author->name = 'J. K. Rowling';
        $author->save();
    }
}
