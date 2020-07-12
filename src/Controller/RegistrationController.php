<?php

namespace App\Controller;

use App\Entity\Club;
use App\Entity\Jugador;
use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Form\RegistrationFormClubType;
use App\Security\EmailVerifier;
use App\Security\LoginFormAuthenticator;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;

class RegistrationController extends AbstractController
{
    private $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }

    /**
     * @Route("/registerclub", name="app_club_register")
     */
    public function registerclub(Request $request, UserPasswordEncoderInterface $passwordEncoder, GuardAuthenticatorHandler $guardHandler, LoginFormAuthenticator $authenticator): Response
    {
        $user = new User(); 
        $club = new Club();
        $form = $this->createForm(RegistrationFormClubType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setIsClub(true);
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $nomres = $form->get('nomres')->getData();
            $nomclub = $form->get('nomclub')->getData();
            $web = $form->get('web')->getData();
            $direccion = $form->get('direccion')->getData();
            $provincia = $form->get('provincia')->getData();
            $poblacion = $form->get('poblacion')->getData();
            $telefono = $form->get('telefono')->getData();

            $club->setNomres($nomres);
            $club->setNomclub($nomclub);
            $club->setWeb($web);
            $club->setDireccion($direccion);
            $club->setProvincia($provincia);
            $club->setPoblacion($poblacion);
            $club->setTelefono($telefono);

            $user->setRoles(['ROLE_CLUB']);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($club);

            $user->addClub($club);

            /* $entityManager = $this->getDoctrine()->getManager();*/
            $entityManager->persist($user); 
            $entityManager->flush();

            // generate a signed url and email it to the user
           /*  $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                (new TemplatedEmail())
                    ->from(new Address('estefialora@hotmail.com', 'Booking track'))
                    ->to($user->getEmail())
                    ->subject('Please Confirm your Email')
                    ->htmlTemplate('registration/confirmation_email.html.twig')
            ); */
            // do anything else you need here, like send an email

            return $guardHandler->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $authenticator,
                'main' // firewall name in security.yaml
            );
        }

        return $this->render('registration/registerclub.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/verify/email", name="app_verify_email")
     */
    public function verifyUserEmail(Request $request): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $this->getUser());
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $exception->getReason());

            return $this->redirectToRoute('app_register');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('success', 'Tu dirección de email ha sido verificada.');

        return $this->redirectToRoute('app_register');
    }

     /**
     * @Route("/registerjugador", name="app_jugador_register")
     */
    public function registerjugador(Request $request, UserPasswordEncoderInterface $passwordEncoder, GuardAuthenticatorHandler $guardHandler, LoginFormAuthenticator $authenticator): Response
    {
        $user = new User(); 
        $jugador = new Jugador();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setIsClub(false);
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $nombre = $form->get('nombre')->getData();
            $apellidos = $form->get('apellidos')->getData();
            $direccion = $form->get('direccion')->getData();
            $provincia = $form->get('provincia')->getData();
            $poblacion = $form->get('poblacion')->getData();
            $telefono = $form->get('telefono')->getData();

            $jugador->setNombre($nombre);
            $jugador->setApellidos($apellidos);
            $jugador->setDireccion($direccion);
            $jugador->setProvincia($provincia);
            $jugador->setPoblacion($poblacion);
            $jugador->setTelefono($telefono);

            $user->setRoles(['ROLE_JUGADOR']);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($jugador);

            $user->addJugador($jugador);
            $entityManager->persist($user); 
            $entityManager->flush();

            // generate a signed url and email it to the user
           /*  $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                (new TemplatedEmail())
                    ->from(new Address('estefialora@hotmail.com', 'Booking track'))
                    ->to($user->getEmail())
                    ->subject('Please Confirm your Email')
                    ->htmlTemplate('registration/confirmation_email.html.twig')
            ); */
            // do anything else you need here, like send an email

            return $guardHandler->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $authenticator,
                'main' // firewall name in security.yaml
            );
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
