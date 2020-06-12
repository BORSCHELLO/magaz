<?php
namespace App\Controller\Main;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;


class Test extends AbstractController
{
    /**
     * @Route("/", name="main")
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
     * @Route("/reg", name="reg")
     */
    public function createUser(Request $request)
    {
        $user = new User();
        $user->setLogin('');
        $user->setEmail('');
        $user->setPassword('');
        $user->setImage('');
        $user->setCity('');

        $form = $this->createFormBuilder($user)
            ->add('Login', TextType::class)
            ->add('Email', EmailType::class)
            ->add('Password', PasswordType::class)
            ->add('Image', TextType::class)
            ->add('City', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Отправить'))
            ->getForm();
            $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $this->addFlash('success','Регистрация прошла успешно');
            return $this->redirectToRoute('main');
        }

        return $this->render('Main/createUser.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
