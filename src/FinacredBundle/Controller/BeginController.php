<?php

namespace FinacredBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class BeginController extends Controller
{
    /**
     * @Route("/Finacred", name="homepageFinacred")
     */
    public function indexAction(Request $request)
    {
		
		//http://localhost:8000/_gpoAdmin/Usuarios 
		//http://localhost:8000/Finacred
        // replace this example code with whatever you need
		
		$arr = array("foo" => "bar", 12 => true);
        echo $arr["foo"]; // bar
        echo $arr[12];    // 1
        return $this->render('FinacredBundle::finacred.html.twig');
    }
	
   /**
     * @Route("/Finacred/{nome}/{empresa}/{telefone}/{email}/{assunto}/{comentarios}", name="send_Email")
     */
    public function sendEmailAction($nome, $empresa, $telefone, $email, $assunto, $comentarios, $msg = null) // rota acionada via ajax
    {
        // versao Swift Mailer

        /** @var  $em EntityManager */
        $em = $this->getDoctrine()->getManager();

        //send email
        $message = $message = \Swift_Message::newInstance()
            ->setSubject('Contato')
            ->setFrom('manekojsantos@gmail.com')
            ->setTo('majosto@yahoo.com.br')
            ->setReplyTo('manekojsantos@gmail.com')
            ->setBody(
                $this->renderView(
                    '@FinacredBundle/Resources/views/Emails/email_contato.twig',
                    array('name' => 'Manoel')
                ),
                'text/html'
            );

        //send feedback by mail
        $retorno = $this->get('mailer')->send($message);

        $arrayReturn = array();
        $arrayReturn[] = array ('msg' => 'email emitido com muito sucesso');
        $jsonArrayReturn = json_encode($arrayReturn);
        return new JsonResponse($jsonArrayReturn);
	}
}
