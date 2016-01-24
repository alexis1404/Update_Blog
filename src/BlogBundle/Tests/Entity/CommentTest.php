<?php

namespace BlogBundle\Tests\Entity;

use BlogBundle\Entity\Comment;

class CommentTest extends \PHPUnit_Framework_TestCase
{
    /*CommentClass fixture*/

    protected $fixture;

    protected function setUp()
    {
        $this->fixture = new Comment();
    }

    protected function tearDown()
    {
        $this->fixture = NULL;
    }

    /*Section fot tests methods*/


    /**
     * @dataProvider providerName
     */

    public function test_authorComment($name)
    {
        $this->fixture->setAuthorComment($name);

        $this->assertTrue($result = $this->fixture->getAuthorComment() == $name);
    }


    /**
     * @dataProvider providerText
     */

    public function test_textComment($text)
    {
        $this->fixture->setTextComment($text);

        $this->assertTrue($result = $this->fixture->getTextComment() == $text);
    }


    /*Section for data providers*/

    public function providerName()
    {
        return array(
            array('Alex'),
            array(NULL),
            array(1)
        );

    }

    public function providerText()
    {
        return array(
            array('Bla-bla-bla!'),
            array(NULL),
            array(12345)
        );
    }

}