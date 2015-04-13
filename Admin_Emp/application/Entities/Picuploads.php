<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Picuploads
 *
 * @Table(name="picuploads")
 * @Entity
 */
class Picuploads
{
    /**
     * @var integer $picid
     *
     * @Column(name="picID", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $picid;

    /**
     * @var string $picpath
     *
     * @Column(name="picPath", type="string", length=200, nullable=false)
     */
    private $picpath;

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
     * Get picid
     *
     * @return integer 
     */
    public function getPicid()
    {
        return $this->picid;
    }

    /**
     * Set picpath
     *
     * @param string $picpath
     * @return Picuploads
     */
    public function setPicpath($picpath)
    {
        $this->picpath = $picpath;
        return $this;
    }

    /**
     * Get picpath
     *
     * @return string 
     */
    public function getPicpath()
    {
        return $this->picpath;
    }

    /**
     * Set usrname
     *
     * @param Empdetails $usrname
     * @return Picuploads
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
