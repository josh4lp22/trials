<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projassign
 *
 * @Table(name="projassign")
 * @Entity
 */
class Projassign
{
    /**
     * @var integer $assnid
     *
     * @Column(name="assnID", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $assnid;

    /**
     * @var Projects
     *
     * @ManyToOne(targetEntity="Projects")
     * @JoinColumns({
     *   @JoinColumn(name="projID", referencedColumnName="projID")
     * })
     */
    private $projid;

    /**
     * @var Empdetails
     *
     * @ManyToOne(targetEntity="Empdetails")
     * @JoinColumns({
     *   @JoinColumn(name="usrName", referencedColumnName="usrName")
     * })
     */
    private $usrname;


    /**
     * Get assnid
     *
     * @return integer 
     */
    public function getAssnid()
    {
        return $this->assnid;
    }

    /**
     * Set projid
     *
     * @param Projects $projid
     * @return Projassign
     */
    public function setProjid(\Projects $projid = null)
    {
        $this->projid = $projid;
        return $this;
    }

    /**
     * Get projid
     *
     * @return Projects 
     */
    public function getProjid()
    {
        return $this->projid;
    }

    /**
     * Set usrname
     *
     * @param Empdetails $usrname
     * @return Projassign
     */
    public function setUsrname(\Empdetails $usrname = null)
    {
        $this->usrname = $usrname;
        return $this;
    }

    /**
     * Get usrname
     *
     * @return Empdetails 
     */
    public function getUsrname()
    {
        return $this->usrname;
    }
}
