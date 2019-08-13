<?php
namespace App\Controller;

use App\Entity\Post;
use App\Entity\User;
use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController{

    private $posts;
    
    /**
     * @Route("/", name="root")
     */
    public function entrypoint() {
        $this->posts = $this->getDoctrine()
                     ->getRepository(Post::class)
                     ->findAll();
        return $this->render('main.html.twig', [
            'posts' => $this->posts, 
        ]);
    }

    /**
     * @Route("/create_post", methods={"POST"})
     */
    public function create_post() {
        $entityManager = $this->getDoctrine()->getManager();
        
        $request = Request::createFromGlobals();
        $new_post = new Post();
        $new_post->setContent( $request->request->get('new_content') );
        $new_post->setUser($this->getDoctrine()
                           ->getRepository(User::class)
                           ->find(2));

        $entityManager->persist($new_post);
        $entityManager->flush();
        return $this->redirectToRoute("root");
    }
}

?>
