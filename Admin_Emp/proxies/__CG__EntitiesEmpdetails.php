<?php

namespace Proxies\__CG__\Entities;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Empdetails extends \Entities\Empdetails implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    /** @private */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    
    public function getUsrname()
    {
        if ($this->__isInitialized__ === false) {
            return $this->_identifier["usrname"];
        }
        $this->__load();
        return parent::getUsrname();
    }

    public function setUsrname($username)
    {
        $this->__load();
        return parent::setUsrname($username);
    }

    public function setPassword($password)
    {
        $this->__load();
        return parent::setPassword($password);
    }

    public function getPassword()
    {
        $this->__load();
        return parent::getPassword();
    }

    public function setEmpname($empname)
    {
        $this->__load();
        return parent::setEmpname($empname);
    }

    public function getEmpname()
    {
        $this->__load();
        return parent::getEmpname();
    }

    public function setEmail($email)
    {
        $this->__load();
        return parent::setEmail($email);
    }

    public function getEmail()
    {
        $this->__load();
        return parent::getEmail();
    }

    public function setSkills($skills)
    {
        $this->__load();
        return parent::setSkills($skills);
    }

    public function getSkills()
    {
        $this->__load();
        return parent::getSkills();
    }

    public function setSkillrating($skillrating)
    {
        $this->__load();
        return parent::setSkillrating($skillrating);
    }

    public function getSkillrating()
    {
        $this->__load();
        return parent::getSkillrating();
    }

    public function setIsadmin($isadmin)
    {
        $this->__load();
        return parent::setIsadmin($isadmin);
    }

    public function getIsadmin()
    {
        $this->__load();
        return parent::getIsadmin();
    }

    public function setProfilepic($profilepic)
    {
        $this->__load();
        return parent::setProfilepic($profilepic);
    }

    public function getProfilepic()
    {
        $this->__load();
        return parent::getProfilepic();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'usrname', 'password', 'empname', 'email', 'skills', 'skillrating', 'isadmin', 'profilepic');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields as $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}