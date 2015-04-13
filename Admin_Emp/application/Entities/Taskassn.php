<?php
namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * Taskassn
 *
 * @Table(name="taskassn")
 * @Entity
 */
class Taskassn
{
    /**
     * @var integer $taskid
     *
     * @Column(name="taskID", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $taskid;

    /**
     * @var string $taskdec
     *
     * @Column(name="taskDec", type="string", length=200, nullable=false)
     */
    private $taskdec;

    /**
     * @var \DateTime $asndate
     *
     * @Column(name="asnDate", type="string", length=15, nullable=false)
     */
    private $asndate;

    /**
     * @var \DateTime $enddate
     *
     * @Column(name="endDate", type="string", length=15, nullable=false)
     */
    private $enddate;

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
     * Get taskid
     *
     * @return integer 
     */
    public function getTaskid()
    {
        return $this->taskid;
    }

    /**
     * Set taskdec
     *
     * @param string $taskdec
     * @return Taskassn
     */
    public function setTaskdec($taskdec)
    {
        $this->taskdec = $taskdec;
        return $this;
    }

    /**
     * Get taskdec
     *
     * @return string 
     */
    public function getTaskdec()
    {
        return $this->taskdec;
    }

    /**
     * Set asndate
     *
     * @param \DateTime $asndate
     * @return Taskassn
     */
    public function setAsndate($asndate)
    {
        $this->asndate = $asndate;
        return $this;
    }

    /**
     * Get asndate
     *
     * @return \DateTime 
     */
    public function getAsndate()
    {
        return $this->asndate;
    }

    /**
     * Set enddate
     *
     * @param \DateTime $enddate
     * @return Taskassn
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;
        return $this;
    }

    /**
     * Get enddate
     *
     * @return \DateTime 
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * Set projid
     *
     * @param Projects $projid
     * @return Taskassn
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
     * @return Taskassn
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
