<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Library\SendMail;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ValidatorInterface $validator): Response
    {
        if (isset($_POST) && !empty($_POST)) {
            $emailConstraint = new \Symfony\Component\Validator\Constraints\Email();
            $errors = $validator->validate($_POST['email'], $emailConstraint);

            if ($errors->count() > 0) {
                $error = $errors->get(0);
                $message = '"'. $error->getInvalidValue() . '" ' . $error->getMessage();

                $this->addFlash('warning', $message);;
                $this->redirectToRoute('home', ['#contact']);
            } else {
                if ($_ENV['APP_ENV'] !== 'dev') {
                    $mail = new SendMail();
                    $result = $mail->sendMail($_POST);
                    if ($result == true) {
                        $this->addFlash('notice', 'Email sent successfully! 😊');
                        $this->redirectToRoute('home', ['#contact']);
                    }
                } else {
                    $this->addFlash('notice', 'Email sending skipped in dev env');
                    $this->redirectToRoute('home', ['#contact']);
                }
            }
            return $this->redirectToRoute('home');
        }
        return $this->render('home/index.html.twig');
    }
}
