<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projects
 *
 * @Table(name="projects")
 * @Entity
 */
class Projects
{
    /**
     * @var integer $projid
     *
     * @Column(name="projID", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $projid;

    /**
     * @var string $projname
     *
     * @Column(name="projName", type="string", length=40, nullable=false)
     */
    private $projname;

    /**
     * @var string $projdesc
     *
     * @Column(name="projDesc", type="string", length=200, nullable=false)
     */
    private $projdesc;


    /**
     * Get projid
     *
     * @return integer 
     */
    public function getProjid()
    {
        return $this->projid;
    }

    /**
     * Set projname
     *
     * @param string $projname
     * @return Projects
     */
    public function setProjname($projname)
    {
        $this->projname = $projname;
        return $this;
    }

    /**
     * Get projname
     *
     * @return string 
     */
    public function getProjname()
    {
        return $this->projname;
    }

    /**
     * Set projdesc
     *
     * @param string $projdesc
     * @return Projects
     */
    public function setProjdesc($projdesc)
    {
        $this->projdesc = $projdesc;
        return $this;
    }

    /**
     * Get projdesc
     *
     * @return string 
     */
    public function getProjdesc()
    {
        return $this->projdesc;
    }
}
