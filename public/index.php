<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/Src/Models/Tag.php';
require_once __DIR__ . '/Src/Models/Category.php';
require_once __DIR__ . '/Src/Models/Post.php';


use Src\Models\Tag;
use Src\Models\Post;
use Src\Models\Category;

// Category

//$model->title = 'football';
//$model->slug = 'Real';
//$model->save();

//$model->title = 'football2';
//$model->slug = 'Barcelona';
//$model->save();

//$model->title = 'football3';
//$model->slug = 'Sevilla';
//$model->save();

//
//$model->title = 'football4';
//$model->slug = 'Atletico';
//$model->save();


//$model->title = 'football5';
//$model->slug = 'Valencia';
//$model->save();


//$model->title = 'football6';
//$model->slug = 'Mallorca';
//$model->save();


//$model->title = 'football3';
//$model->slug = 'Sevilla';
//$model->save();

//$category = Category::find(8);
//$category->title = 'APL';
//$category->slug = 'Arsenal';
//$category->save();

//$categories = Category::find(11);
//$categories->delete();

//$models = Category::all();
//foreach ($models as $model) {
//    foreach ($model->posts as $post) {
//        echo $post->title;
//    }
//}
//

// Post

//$category = Category::find(7);
//$post = new Post();
//$post->title = 'ooo';
//$post->slug = 'ooo';
//$post->body = 'ooo';
//$post->category_id = $category->id;
//$post->save();

//$category = Category::find(6);
//$post = new Post();
//$post->title = 'xxx';
//$post->slug = 'xxx';
//$post->body = 'xxx';
//$post->category_id = $category->id;
//$post->save();
//
//$category = Category::find(9);
//$post = new Post();
//$post->title = 'eee';
//$post->slug = 'eee';
//$post->body = 'eee';
//$post->category_id = $category->id;
//$post->save();

//$category = Category::find(8);
//$post = new Post();
//$post->title = 'aaa';
//$post->slug = 'aaa';
//$post->body = 'aaa';
//$post->category_id = $category->id;
//$post->save();

//$category = Category::find(7);
//$post = new Post();
//$post->title = 'qqqq';
//$post->slug = 'qqqq';
//$post->body = 'qqqq';
//$post->category_id = $category->id;
//$post->save();

//$category = Category::find(10);
//$post = new Post();
//$post->title = 'asdcxv';
//$post->slug = 'xcvxcvxc';
//$post->body = 'xcvxcv';
//$post->category_id = $category->id;
//$post->save();

//$category = Category::find(9);
//$post = new Post();
//$post->title = 'asdas';
//$post->slug = 'dasas';
//$post->body = 'asdasd';
//$post->category_id = $category->id;
//$post->save();

//$category = Category::find(10);
//$post = new Post();
//$post->title = 'tesrt';
//$post->slug = 'tesrt';
//$post->body = 'tesrt';
//$post->category_id = $category->id;
//$post->save();


//$category = Category::find(10);
//$post = new Post();
//$post->title = 'asdasd';
//$post->slug = 'tasdasd';
//$post->body = 'asdasd';
//$post->category_id = $category->id;
//$post->save();

//$posts = Post::find(1);
//$posts->delete();

//$post = Post::find(2);
//$post->tags()->sync([7,5,1]);

//$post = Post::find(3);
//$post->tags()->sync([10,5,1]);
//
//$post = Post::find(4);
//$post->tags()->sync([9,5,1]);
//
//$post = Post::find(5);
//$post->tags()->sync([6,5,1]);
//
//$post = Post::find(6);
//$post->tags()->sync([3,5,1]);
//
//$post = Post::find(7);
//$post->tags()->sync([2,5,1]);
//
//$post = Post::find(8);
//$post->tags()->sync([4,3,6]);
//
//$post = Post::find(9);
//$post->tags()->sync([5,7,1]);
//
//$post = Post::find(10);
//$post->tags()->sync([10,3,1]);

//$category = Category::find(9);
//$post = Post::find(10);
//$post->title = '11111';
//$post->slug = '11111';
//$post->body = '1111';
//$post->category_id = $category->id;
//$post->save();


// Tag

//$model2 = new Tag;
//$model2->title = 'rrr';
//$model2->slug = 'rrr';
//$model2->save();

//$model2 = new Tag;
//$model2->title = 'ff';
//$model2->slug = 'ff';
//$model2->save();

//$model2 = new Tag;
//$model2->title = 'gg';
//$model2->slug = 'gg';
//$model2->save();
//
//$model2 = new Tag;
//$model2->title = 'mm';
//$model2->slug = 'mm';
//$model2->save();
//
//$model2 = new Tag;
//$model2->title = 'hh';
//$model2->slug = 'hh';
//$model2->save();
//
//$model2 = new Tag;
//$model2->title = 'as';
//$model2->slug = 'as';
//$model2->save();
//
//$model2 = new Tag;
//$model2->title = 'ds';
//$model2->slug = 'ds';
//$model2->save();
//
//$model2 = new Tag;
//$model2->title = 'fd';
//$model2->slug = 'vc';
//$model2->save();
//
//$model2 = new Tag;
//$model2->title = 'bv';
//$model2->slug = 'bv';
//$model2->save();
//
//$model2 = new Tag;
//$model2->title = 'vb';
//$model2->slug = 'vb';
//$model2->save();
//



























//use Src\Models\Category;
//
//require __DIR__ . '/Src/Models/Model.php';
//require __DIR__ . '/Src/Models/Category.php';
//
//
//
//
//$user = Category::find(1);
//var_dump($user); // SELECT * FROM user WHERE id = :id
//
//$user = Category::findAll();
//var_dump($user);
//
//$user = new Category;
//$user->name = 'John';
//$result = $user->save();
//var_dump($result); // UPDATE user SET name = :name, email = 'email' WHERE id = :id
//
//$user = new Category;
//$result = $user->delete();
//var_dump($result); // DELETE FROM user WHERE id = :id
//
//$user = new Category;
//$user->id = 1;
//$user->name = 'John';
//$user->email = 'some@gmail.com';
//$result = $user->save();
//var_dump($result); // INSERT INTO user (id, name, email) VALUES (:id, :name, :email)


