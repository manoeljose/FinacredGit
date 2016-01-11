<?php

namespace FinacredBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use phpmailer

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
        ////** @var  $em EntityManager*/
        ////$em = $this->getDoctrine()->getManager();

        //$headers = "MIME-Version: 1.1\r\n";
        //$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
        ////$headers .= "From: $email\r\n"; // remetente
        //$headers .= "From: majosto@yahoo.com.br\r\n"; // remetente
        //$headers .= "Return-Path: majosto@yahoo.com.br\r\n"; // return-path
        ////$envio = mail("majosto@yahoo.com.br", $assunto, $comentarios, $headers);
        //$envio = mail($email, $assunto, $comentarios, $headers);

        //$arrayReturn = array();
        //$arrayReturn[] = array ('msg' => 'email emitido com muito sucesso');
        //$jsonArrayReturn = json_encode($arrayReturn);
        //return new JsonResponse($jsonArrayReturn);
		

        // ************** phpmailer
// Use este require se você usou o Composer

        //require 'phpmailer/phpmailer/PHPMailerAutoload.php';
        //require 'C:\Users\Manoel\OneDrive\BkpDiario_01\Finacred\vendor\phpmailer\phpmailer\PHPMailerAutoload.php';

        $Mailer = new PHPMailer();

// define que será usado SMTP
        $Mailer->IsSMTP();

// envia email HTML
        $Mailer->isHTML(true);

// codificação UTF-8, a codificação mais usada recentemente
        $Mailer->Charset = 'UTF-8';

// Configurações do SMTP
        $Mailer->SMTPAuth = true;
        $Mailer->SMTPSecure = 'ssl';
        $Mailer->Host = 'smtp.gmail.com';
        $Mailer->Port = 465;
        $Mailer->Username = 'manekojsantos@gmail.com';
        $Mailer->Password = 'perg0la99';

// E-Mail do remetente (deve ser o mesmo de quem fez a autenticação
// nesse caso seu_login@gmail.com)
        $Mailer->From = 'manekojsantos@gmail.com';

// Nome do remetente
        $Mailer->FromName = 'Manoel';

// assunto da mensagem
        $Mailer->Subject = 'Teste';

// corpo da mensagem
//        $Mailer->Body = 'Mensagem em HTML';

// corpo da mensagem em modo texto
        $Mailer->AltBody = 'Mensagem em texto';

// adiciona destinatário (pode ser chamado inúmeras vezes)
        $Mailer->AddAddress('manekojsantos@gmail.com');

// adiciona um anexo
//        $Mailer->AddAttachment('arquivo.pdf');

// verifica se enviou corretamente
        if ($Mailer->Send())
        {
            echo "Enviado com sucesso";
        }
        else
        {
            echo 'Erro do PHPMailer: ' . $Mailer->ErrorInfo;
        }

        $arrayReturn = array();
        $arrayReturn[] = array ('msg' => 'email emitido com muito sucesso');
        $jsonArrayReturn = json_encode($arrayReturn);
        return new JsonResponse($jsonArrayReturn);
	}
}
