<?php

namespace Src\Form;

use Lib\Form\NotNullValidator;
use Lib\Form\Form;
use Src\Entity\User;
use Src\Entity\Post;

class CommentEdit extends Form {

    public function build() {

        $managerPost = $this->database->getManagerOf(Post::class);
        $post = $managerPost->findAll();
        $postArray = array_combine(array_map(function($c) {
                    return $c->getId();
                }, $post), array_map(function($c) {
                    return $c->getTitle();
                }, $post));

        $managerUser = $this->database->getManagerOf(User::class);
        $user = $managerUser->findAll();
        $userArray = array_combine(array_map(function($c) {
                    return $c->getId();
                }, $user), array_map(function($c) {
                    return $c->getUsername();
                }, $user));

        $this->form = [ 'id' => [
                'name' => 'id',
                'label' => '',
                'placeholder' => '',
                'value' => $this->entity->getId(),
                'errors' => [],
                "validate" => [],
            ],
            'postId' => [
                'name' => 'post_id',
                'label' => 'Article',
                'placeholder' => 'Article',
                'option_array' => $postArray,
                'value' => $this->entity->getPostId(),
                'errors' => [],
                "validate" => [
                    'notNull' => new NotNullValidator('Merci de spécifier un article')
                ],
            ],
            'userId' => [
                'name' => 'user_id',
                'label' => 'Utilisateur',
                'placeholder' => 'Utilisateur',
                'option_array' => $userArray,
                'value' => $this->entity->getUserId(),
                'errors' => [],
                "validate" => [
                    'notNull' => new NotNullValidator('Merci de spécifier un utilisateur')
                ],
            ],
            'content' => [
                'name' => 'content',
                'label' => 'Contenu',
                'placeholder' => 'Contenu',
                'value' => $this->entity->getContent(),
                'errors' => [],
                "validate" => [
                    'notNull' => new NotNullValidator('Merci de spécifier un contenu')
                ],
            ]
        ];
    }

}