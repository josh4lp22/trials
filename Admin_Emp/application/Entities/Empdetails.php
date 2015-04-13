<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Empdetails
 *
 * @Table(name="empdetails")
 * @Entity
 */
class Empdetails
{
    /**
     * @var string $usrname
     *
     * @Column(name="usrName", type="string", length=40, nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $usrname;

    /**
     * @var string $password
     *
     * @Column(name="password", type="string", length=30, nullable=false)
     */
    private $password;

    /**
     * @var string $empname
     *
     * @Column(name="empName", type="string", length=40, nullable=false)
     */
    private $empname;

    /**
     * @var string $email
     *
     * @Column(name="email", type="string", length=40, nullable=false)
     */
    private $email;

    /**
     * @var string $skills
     *
     * @Column(name="skills", type="string", length=200, nullable=false)
     */
    private $skills;

    /**
     * @var float $skillrating
     *
     * @Column(name="skillRating", type="float", nullable=false)
     */
    private $skillrating;

    /**
     * @var integer $isadmin
     *
     * @Column(name="isAdmin", type="integer", nullable=false)
     */
    private $isadmin;

    /**
     * @var string $profilepic
     *
     * @Column(name="profilepic", type="string", length=200, nullable=true)
     */
    private $profilepic;


    /**
     * Get usrname
     *
     * @return string 
     */
    public function getUsrname()
    {
        return $this->usrname;
    }

    public function setUsrname($username)
    {
    	$this->username = $usrname;
    	return $this;
    }
    
    /**
     * Set password
     *
     * @param string $password
     * @return Empdetails
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set empname
     *
     * @param string $empname
     * @return Empdetails
     */
    public function setEmpname($empname)
    {
        $this->empname = $empname;
        return $this;
    }

    /**
     * Get empname
     *
     * @return string 
     */
    public function getEmpname()
    {
        return $this->empname;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Empdetails
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set skills
     *
     * @param string $skills
     * @return Empdetails
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;
        return $this;
    }

    /**
     * Get skills
     *
     * @return string 
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Set skillrating
     *
     * @param float $skillrating
     * @return Empdetails
     */
    public function setSkillrating($skillrating)
    {
        $this->skillrating = $skillrating;
        return $this;
    }

    /**
     * Get skillrating
     *
     * @return float 
     */
    public function getSkillrating()
    {
        return $this->skillrating;
    }

    /**
     * Set isadmin
     *
     * @param integer $isadmin
     * @return Empdetails
     */
    public function setIsadmin($isadmin)
    {
        $this->isadmin = $isadmin;
        return $this;
    }

    /**
     * Get isadmin
     *
     * @return integer 
     */
    public function getIsadmin()
    {
        return $this->isadmin;
    }

    /**
     * Set profilepic
     *
     * @param string $profilepic
     * @return Empdetails
     */
    public function setProfilepic($profilepic)
    {
        $this->profilepic = $profilepic;
        return $this;
    }

    /**
     * Get profilepic
     *
     * @return string 
     */
    public function getProfilepic()
    {
        return $this->profilepic;
    }
}
