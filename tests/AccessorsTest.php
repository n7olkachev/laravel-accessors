<?php

namespace N7olkachev\LaravelAccessors\Test;

use N7olkachev\LaravelAccessors\Accessors;
use PHPUnit\Framework\TestCase;

class AccessorsTest extends TestCase
{
    /** @test */
    public function it_works_for_getters()
    {
        $user = new User('Nick');
        $this->assertEquals($user->name, 'Nick');
    }

    /** @test */
    public function it_works_for_setters()
    {
        $user = new User('Nick');
        $user->name = 'Not Nick';
        $this->assertEquals($user->name, 'Not Nick');
    }

    /** @test */
    public function it_works_with_snake_case()
    {
        $user = new User('Nick', false);
        $this->assertTrue($user->not_active);
        $user->active = true;
        $this->assertFalse($user->not_active);
    }

    /** @test */
    public function it_works_with_camel_case()
    {
        $user = new User('Nick', false);
        $this->assertTrue($user->notActive);
        $user->active = true;
        $this->assertFalse($user->notActive);
    }

    /** @test */
    public function it_throws_on_undefined_properties()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Undefined property: age');
        $user = new User('Nick');
        $user->age = 5;
    }
}

class User
{
    use Accessors;

    protected $name;

    protected $isActive;

    public function __construct($name, $isActive = false)
    {
        $this->name = $name;
        $this->isActive = $isActive;
    }

    protected function getNameAttribute()
    {
        return $this->name;
    }

    protected function setNameAttribute($value)
    {
        $this->name = $value;
    }

    protected function getActiveAttribute()
    {
        return $this->isActive;
    }

    protected function setActiveAttribute($isActive)
    {
        $this->isActive = $isActive;
    }

    protected function getNotActiveAttribute()
    {
        return !$this->isActive;
    }
}
