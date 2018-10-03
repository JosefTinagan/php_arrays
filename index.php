<?php

class Post{
	public $title;
	public $author;
	public $published;

	public function __construct($title, $author, $published){
		$this->title = $title;
		$this->author = $author;
		$this->published = $published;
	}
}

$posts = [
	new Post('My First Post', 'JP', true),
	new Post('My Second Post', 'JP', true),
	new Post('My Third Post', 'JP', true),
	new Post('My Fourth Post', 'PF', false)
];

//var_dump($posts);

$unpublishedPosts = array_filter($posts, function($post){
	return !$post->published;	 // $post->published === false;
});

// var_dump($unpublishedPosts);

$publishedPosts = array_filter($posts, function($post){
	return $post->published;
});

// var_dump($publishedPosts);

// $modified = array_map(function ($post){
// 	return 'foobar';
// }, $posts);

$modified = array_map(function ($post){
	$post->published = true;

	return $post;
}, $posts);

// var_dump($modified);

// foreach($posts as $post){
// 	$post->published = true;
// }

//var_dump($posts);

// foreach($posts as $index => $post){
// 	$posts[$index] = (array) $post;
// }

//var_dump($posts);

$modified = array_map(function ($post){
	return (array) $post; // return the $post object as an array
}, $posts);

//var_dump($modified);

$modified = array_map(function ($post){
	return ['title' => $post->title]; // return only the $post->title, not the published or author
}, $posts);

// var_dump($modified);

$titles = array_map(function ($post){
	return $post->title;
}, $posts);

//var_dump($titles);

$titles = array_column($posts, 'title'); // same as above

//var_dump($titles);

$posts = array_map(function ($post){
	return (array) $post;
}, $posts);

var_dump($posts);

$titles = array_column($posts, 'title');
$authors = array_column($posts, 'author');
var_dump($titles);
var_dump($authors);

$authors = array_column($posts, 'author','title');
var_dump($authors);

?>