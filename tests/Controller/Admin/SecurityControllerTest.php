<?php


namespace App\Controller\Admin;
//use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Panther\PantherTestCase;
use Symfony\Component\HttpFoundation\Response;

class SecurityControllerTest extends PantherTestCase
{

    /**
     * @dataProvider getUrlsForRegularUsers
     *
     * @param string $httpMethod
     * @param string $url
     */
    public function testAccessDeniedForRegularUsers(string $httpMethod, string $url): void
    {
        $client = static::createPantherClient([], [
            'PHP_AUTH_USER' => 'iibarguren',
            'PHP_AUTH_PW' => 'pasatrin0',
        ]);
        $client->request($httpMethod, $url);
        $this->assertSame(302, $client->getResponse()->getStatusCode());
    }
    public function getUrlsForRegularUsers()
    {
        yield ['GET', '/admin/amp'];
        yield ['GET', '/admin/amp/10'];
        yield ['GET', '/admin/amp/10/edit'];
        yield ['POST', '/admin/amp/10/delete'];
    }
    public function testAdminBackendHomePage()
    {
        $client = static::createPantherClient([], [
            'PHP_AUTH_USER' => 'jane_admin',
            'PHP_AUTH_PW' => 'kitten',
        ]);
        $crawler = $client->request('GET', '/admin/amp');
        $this->assertSame(302, $client->getResponse()->getStatusCode());
//        $this->assertGreaterThanOrEqual(
//            1,
//            $crawler->filter('body#admin_post_index #main tbody tr')->count(),
//            'The backend homepage displays all the available posts.'
//        );
    }
    /**
     * This test changes the database contents by creating a new blog post. However,
     * thanks to the DAMADoctrineTestBundle and its PHPUnit listener, all changes
     * to the database are rolled back when this test completes. This means that
     * all the application tests begin with the same database contents.
     */
    public function testAdminNewPost()
    {
        $postName = 'TEST AMP '.mt_rand();
        $postFecha = $this->generateRandomString(255);
        $postClasificacion = $this->generateRandomString(1024);
        $postSignatura = $this->generateRandomString(1024);
        $postObservaciones= $this->generateRandomString(1024);
        $client = static::createPantherClient([], [
            'PHP_AUTH_USER' => 'jane_admin',
            'PHP_AUTH_PW' => 'kitten',
        ]);
        $crawler = $client->request('GET', '/admin/amp/new');
        $form = $crawler->selectButton('Gorde')->form([
            'amp[name]' => $postName,
            'amp[fecha]' => $postFecha,
            'amp[clasificacion]' => $postClasificacion,
            'amp[signatura]' => $postSignatura,
            'amp[observaciones]' => $postObservaciones,
        ]);
        $client->submit($form);
        $this->assertSame(Response::HTTP_FOUND, $client->getResponse()->getStatusCode());
        $post = $client->getContainer()->get('doctrine')->getRepository(Post::class)->findOneBy([
            'title' => $postName,
        ]);
        $this->assertNotNull($post);
        $this->assertSame($postFecha, $post->getFecha());
        $this->assertSame($postClasificacion, $post->getClasificacion());
        $this->assertSame($postSignatura, $post->getSignatua());
        $this->assertSame($postObservaciones, $post->getObservaciones());
    }
    public function testAdminShowPost()
    {
        $client = static::createPantherClient([], [
            'PHP_AUTH_USER' => 'jane_admin',
            'PHP_AUTH_PW' => 'kitten',
        ]);
        $client->request('GET', '/admin/amp/1');
        $this->assertSame(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }
    /**
     * This test changes the database contents by editing a blog post. However,
     * thanks to the DAMADoctrineTestBundle and its PHPUnit listener, all changes
     * to the database are rolled back when this test completes. This means that
     * all the application tests begin with the same database contents.
     */
    public function testAdminEditPost()
    {
        $newBlogPostTitle = 'Edit amp'.mt_rand();
        $client = static::createPantherClient([], [
            'PHP_AUTH_USER' => 'iibarguren',
            'PHP_AUTH_PW' => 'pasatrin',
        ]);
        $crawler = $client->request('GET', '/admin/amp/1/edit');
        $form = $crawler->selectButton('Save changes')->form([
            'amp[name]' => $newBlogPostTitle,
        ]);
        $client->submit($form);
        $this->assertSame(Response::HTTP_FOUND, $client->getResponse()->getStatusCode());
        /** @var Post $post */
        $post = $client->getContainer()->get('doctrine')->getRepository(Post::class)->find(1);
        $this->assertSame($newBlogPostTitle, $post->getTitle());
    }
    /**
     * This test changes the database contents by deleting a blog post. However,
     * thanks to the DAMADoctrineTestBundle and its PHPUnit listener, all changes
     * to the database are rolled back when this test completes. This means that
     * all the application tests begin with the same database contents.
     */
    public function testAdminDeletePost()
    {
        $client = static::createPantherClient([], [
            'PHP_AUTH_USER' => 'jane_admin',
            'PHP_AUTH_PW' => 'kitten',
        ]);
        $crawler = $client->request('GET', '/en/admin/post/1');
        $client->submit($crawler->filter('#delete-form')->form());
        $this->assertSame(Response::HTTP_FOUND, $client->getResponse()->getStatusCode());
        $post = $client->getContainer()->get('doctrine')->getRepository(Post::class)->find(1);
        $this->assertNull($post);
    }
    private function generateRandomString(int $length): string
    {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return mb_substr(str_shuffle(str_repeat($chars, ceil($length / mb_strlen($chars)))), 1, $length);
    }
}
