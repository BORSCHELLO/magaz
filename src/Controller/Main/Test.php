<?php
namespace App\Controller\Main;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Test extends AbstractController
{
    /**
     * @Route("/main", name="main")
     */
    public function number()
    {
        $number = mt_rand(0, 100);

        return $this->render('Main/main.html.twig', array(
            'number' => $number,
        ));
    }
    /**
     * @Route("/Basket", name="Basket")
     */
    public function number1()
    {
        $number = mt_rand(0, 100);

        return $this->render('Main/basket.html.twig', array(
            'number' => $number,
        ));
    }
    /**
     * @Route("/admin", name="admin")
     */
    public function number2()
    {
        $number = mt_rand(0, 100);

        return $this->render('Admin/Admin.html.twig', array(
            'number' => $number,
        ));
    }
}
