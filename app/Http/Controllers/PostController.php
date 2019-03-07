<?php

namespace App\Http\Controllers;

use App\Author;
use App\Post;
use App\Traits\ObjectHandler;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use ObjectHandler;

    private $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://jsonplaceholder.typicode.com/']);
    }

    function restCreateUser($options = [])
    {
        $method = 'POST';
        $url = 'users';
        return $this->restRequest($method, $url, $options);
    }

    function restCreatePost($options = [])
    {
        $method = 'POST';
        $url = 'posts';
        return $this->restRequest($method, $url, $options);
    }

    function restGetPosts($id = null, $options = [])
    {
        $method = 'GET';
        $url = 'posts';
        $url = (!empty($id)) ? $url . '/' . $id : $url;
        return $this->restRequest($method, $url);
    }

    function restGetUsers($id = null, $options = [])
    {
        $method = 'GET';
        $url = 'users';
        $url = (!empty($id)) ? $url . '/' . $id : $url;
        return $this->restRequest($method, $url);
    }

    function restGetComments($commentId = null, $options = [])
    {
        $method = 'GET';
        $url = 'comments';
        $url = (!empty($id)) ? $url . '/' . $id : $url;
        return $this->restRequest($method, $url, $options);
    }

    function restRequest($method, $url, $options = [])
    {
        try {
            $request = $this->client->request($method, $url, $options);
            $content = $request->getBody()->getContents();
            $parse = json_decode($content);
        } catch (RequestException $e) {
            throw $e;
        }
        return $parse;
    }

    function mapPosts($posts, $users, $comments)
    {
        $map = array_map(function ($element) use ($users, $comments) {
            $author = array_filter($users, function ($user) use ($element) {
                return $user->id === $element->userId;
            });
            $comments = array_filter($comments, function ($comment) use ($element) {
                return $comment->postId === $element->id;
            });
            $element->author = $author;
            $element->comments = $comments;
            return $element;
        }, $posts);
        return $map;
    }

    public function getPosts()
    {
        try {
            $posts = $this->restGetPosts();
            $users = $this->restGetUsers();
            $comments = $this->restGetComments();
            return $this->mapPosts($posts, $users, $comments);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage()], $e->getCode());
        }
    }

    public function getPostById($postId)
    {
        try {
            $post = $this->restGetPosts($postId);
            $post->author = $this->restGetUsers($post->userId);
            $post->comments = $this->restGetComments(null, ['query' => ['postId' => $post->id]]);
            return (array)$post;
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage()], $e->getCode());
        }
    }

    public function savePost(Request $request)
    {
        /**
         * On the test was informed that jsonplaceholder dont receive resquests(POST) but i checked that is possible,
         * then i implemented a function to save the new post. Jsonplaceholder dont save the new data but is returned
         * a new item id and return http status code 201 (created), it's only example post.
         *
         * Verify if gone supplied userId and if userId is associated a user existent or should be created new user
         */
        try {
            $request = $this->convertToObject($request->all());
            if (empty($request->userId)) {
                if (empty($request->author)) {
                    throw new \Exception('UserId and author data not supplied', 400);
                } else {
                    $author = new Author();
                    $newUser = $this->restCreateUser(['form_params' => $author->fill((array)$request->author)->toArray()]);
                    $request->userId = $newUser->id;
                }
            } else {
                $this->restGetUsers($request->userId);
            }
            /**
             * Save the new post
             */
            $post = new Post();
            $newPost = $this->restCreatePost(['form_params' => $post->fill((array)$request)->toArray()]);
            return response()->json($newPost, 201);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage()], $e->getCode());
        }
    }
}
