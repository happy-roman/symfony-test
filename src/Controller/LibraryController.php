<?php


namespace App\Controller;

use App\Entity\Book;
use http\Env\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class LibraryController extends DefaultController
{
    /**
     * @Route("books", name="books" )
     */
    public function index(): Response
    {
        $books = $this->getDoctrine()->getRepository(Book::class)->findAll();
        $forRender = parent::renderDefault();
        $forRender['title'] = 'ALL BOOKS';
        $forRender['books'] = $books;

        return $this->render('library.html.twig', $forRender);
    }

    /**
     * @Route ("book_update/{id}", name="book_update")
     * @param int $id
     * @return Response
     */
    public function update(int $id): Response
    {
        $book = $this->getDoctrine()->getRepository(Book::class)->find($id);
        $forRender = parent::renderDefault();
        $forRender['title'] = 'ALL BOOKS';
        $forRender['book'] = $book;
        $forRender['id'] = $id;
        return $this->render('book.html.twig', $forRender);
    }

    /**
     * @Route ("book_delete/{id}", name="book_delete")
     * @param int $id
     * @return Response
     */
    public function delete(int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $book = $entityManager->getRepository(Book::class)->find($id);
        $entityManager->remove($book);
        $entityManager->flush();
        return $this->redirectToRoute('books');
    }

}
