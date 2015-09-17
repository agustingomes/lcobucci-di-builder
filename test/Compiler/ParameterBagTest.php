<?php
namespace Lcobucci\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @author Luís Otávio Cobucci Oblonczyk <lcobucci@gmail.com>
 */
class ParameterBagTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     *
     * @covers Lcobucci\DependencyInjection\Compiler\ParameterBag::__construct
     */
    public function constructShouldInitializeTheParameters()
    {
        $pass = new ParameterBag(['test' => 1]);

        $this->assertAttributeEquals(['test' => 1], 'parameters', $pass);
    }

    /**
     * @test
     *
     * @covers Lcobucci\DependencyInjection\Compiler\ParameterBag::__construct
     * @covers Lcobucci\DependencyInjection\Compiler\ParameterBag::set
     */
    public function setShouldConfigureAParameter()
    {
        $pass = new ParameterBag();
        $pass->set('test', 1);

        $this->assertAttributeEquals(['test' => 1], 'parameters', $pass);
    }

    /**
     * @test
     *
     * @covers Lcobucci\DependencyInjection\Compiler\ParameterBag::__construct
     * @covers Lcobucci\DependencyInjection\Compiler\ParameterBag::get
     */
    public function getShouldReturnTheValueOfTheParameter()
    {
        $pass = new ParameterBag(['test' => 1]);

        $this->assertEquals(1, $pass->get('test'));
    }

    /**
     * @test
     *
     * @covers Lcobucci\DependencyInjection\Compiler\ParameterBag::__construct
     * @covers Lcobucci\DependencyInjection\Compiler\ParameterBag::get
     */
    public function getShouldReturnTheDefaultValueWhenParameterDoesNotExist()
    {
        $pass = new ParameterBag();

        $this->assertEquals(1, $pass->get('test', 1));
    }

    /**
     * @test
     *
     * @covers Lcobucci\DependencyInjection\Compiler\ParameterBag::__construct
     * @covers Lcobucci\DependencyInjection\Compiler\ParameterBag::process
     */
    public function invokeShouldAppendAllConfiguredParametersOnTheBuilder()
    {
        $builder = new ContainerBuilder();
        $pass = new ParameterBag(['test' => 1]);

        $pass->process($builder);
        $this->assertEquals(1, $builder->getParameter('test'));
    }
}
