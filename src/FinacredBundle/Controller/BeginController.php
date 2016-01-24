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

        //envia email pra própria empresa com as informações preenchidas pelo contato
        $message = $message = \Swift_Message::newInstance()
            ->setSubject('Contato')
            ->setFrom(array('manekojsantos@gmail.com' => 'Finacred'))
            ->setTo(array('manekojsantos@gmail.co' => 'Finacred'))      // 'majosto@yahoo.com.br'
            ->setReplyTo('manekojsantos@gmail.com')
            //->attach(Swift_Attachment::fromPath('my-document.pdf'))    // anexo
            ->setBody(
                $this->renderView(
                    '@FinacredBundle/Resources/views/Emails/email_contato.twig',
                    array('contato_nome' => $nome,
                        'contato_empresa' => $empresa,
                        'contato_telefone' => $telefone,
                        'contato_email' => $email,
                        'contato_assunto' => $assunto,
                        'contato_comentarios' => $comentarios
                    )
                ),
                'text/html'
            );
        $retorno = $this->get('mailer')->send($message);

        $arrayReturn = array();
        if (!($retorno)) {
            $arrayReturn[] = array ('msg' => 'Problemas na emissao de email de contato');
            $jsonArrayReturn = json_encode($arrayReturn);
            return new JsonResponse($jsonArrayReturn);
        }


        //Envia email resposta para quem fez o contato
        $message = $message = \Swift_Message::newInstance()
            ->setSubject('Contato')
            ->setFrom(array('manekojsantos@gmail.com' => 'Finacred'))
            ->setTo(array($email => $nome))      // 'majosto@yahoo.com.br'
            ->setReplyTo('manekojsantos@gmail.com')
            //->attach(Swift_Attachment::fromPath('my-document.pdf'))    // anexo
            ->setBody(
                $this->renderView(
                    '@FinacredBundle/Resources/views/Emails/email_resposta.twig',
                    array('contato_nome' => $nome,
                        'contato_empresa' => $empresa,
                        'contato_telefone' => $telefone,
                        'contato_email' => $email,
                        'contato_assunto' => $assunto,
                        'contato_comentarios' => $comentarios
                    )
                ),
                'text/html'
            );

        //send feedback by mail
        $retorno = $this->get('mailer')->send($message);

        $arrayReturn = array();
        if ($retorno) {
            $arrayReturn[] = array ('msg' => 'email emitido com sucesso');
        }
        else {
            $arrayReturn[] = array ('msg' => 'Problemas na emissao de email de resposta');
        }

        $jsonArrayReturn = json_encode($arrayReturn);
        return new JsonResponse($jsonArrayReturn);
	}
}
