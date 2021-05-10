<?php

namespace App\Controller;

use App\Entity\Cliente;
use App\Form\ClienteType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Client;
use Symfony\Component\VarDumper\VarDumper;

class ClientesController extends Controller
{
    /**
     * @Route("/clientes", name="listar_clientes")
     * @Template("clientes/index.html.twig")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();

        $clientes = $em->getRepository(Cliente::class)->findAll();

        return [
            'clientes' => $clientes
        ];
    }

    /**
     * @Route("/cliente/visualizar/{id}", name="visualizar_cliente")
     * @Template("clientes/view.html.twig")
     * @param Cliente $cliente
     * @return array
     */
    public function view(Cliente $cliente)
    {
        return [
            'cliente' => $cliente
        ];
    }

    /**
     * @Route("cliente/cadastrar", name="cadastrar_cliente")
     * @Template("clientes/create.html.twig")
     *
     * @return array
     */
    public function create(Request $request)
    {
        $cliente = new Cliente();
        $form = $this->createForm(ClienteType::class, $cliente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cliente);
            $em->flush();

            $this->addFlash('success', "Cliente foi salvo com sucesso!");
            return $this->redirectToRoute('listar_clientes');
        }

        return [
            'form' => $form->createView()
        ];
    }
}
