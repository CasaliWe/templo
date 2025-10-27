<?php
namespace Repositories;

use Models\Blog;
use Core\Logger;


class BlogRepository {
    // pegando post
    public static function getOne($id) {
        return Blog::where('id', $id)->first();
    }

    // buscando todos os posts
    public static function getAll() {
        return Blog::all();
    }

    // pegando posts relacionados (mesma tag, exceto o post atual)
    public static function getRelacionados($tag, $excludeId = null) {
        $query = Blog::where('tag', $tag);
        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }
        return $query->get();
    }

    // pegando posts por tag
    public static function getAllTag($tag) {
        return Blog::where('tag', $tag)->get();
    }
}