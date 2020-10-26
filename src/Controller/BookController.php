<?php


namespace App\Controller;


use App\Entity\Book;
use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\RedirectController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends DefaultController
{
    /**
     * @Route ("update/{id}", name="update")
     * @param Request $request
     * @param int $id
     */
    public function update(Request $request, int $id)
    {
        $params = $request->request->all();
        $entityManager = $this->getDoctrine()->getManager();
        $book = $entityManager->getRepository(Book::class)->find($id);
        if (!$book) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        $book->setName($params['name'])
            ->setAuthor($params['author'])
            ->setYear($params['year']);
        $entityManager->persist($book);
        $entityManager->flush();

        return $this->redirectToRoute('books');
    }

    /**
     * @Route ("create_book", name="create_book")
     * @param Request $request
     */
    public function create(Request $request)
    {
        if( $request->isMethod('post'))
        {
            $params = $request->request->all();
            $entityManager = $this->getDoctrine()->getManager();
            $book = new Book();
            $book->setName($params['name'])
                ->setAuthor($params['author'])
                ->setYear($params['year']);
            $entityManager->persist($book);
            $entityManager->flush();
            return $this->redirectToRoute('books');
        }
        $forRender = parent::renderDefault();
        $forRender['title'] = 'CREATE BOOKS';
        return $this->render('create-book.html.twig', $forRender );
    }

}
