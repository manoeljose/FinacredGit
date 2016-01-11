<?php

namespace FinacredBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class BeginController extends Controller
{
    /**
     * @Route("/Finacred", name="homepage")
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
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function sendEmailAction($nome, $empresa, $telefone, $email, $assunto, $comentarios, $msg = null) // rota acionada via ajax
    {
         /** @var  $em EntityManager*/
        //$em = $this->getDoctrine()->getManager();
    
		$headers = "MIME-Version: 1.1\r\n";
		$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
		//$headers .= "From: $email\r\n"; // remetente
        $headers .= "From: majosto@yahoo.com.br\r\n"; // remetente
		$headers .= "Return-Path: majosto@yahoo.com.br\r\n"; // return-path
		//$envio = mail("majosto@yahoo.com.br", $assunto, $comentarios, $headers);
        $envio = mail($email, $assunto, $comentarios, $headers);
		
		$arrayReturn = array();
		$arrayReturn[] = array ('msg' => 'email emitido com muito sucesso');
		$jsonArrayReturn = json_encode($arrayReturn);
        return new JsonResponse($jsonArrayReturn);
		
		//$jsonNewUserMessage = 'email emitido com sucesso';
		//return $jsonNewUserMessage;
		
		//return ('email emitido com sucesso');
	}	
}
