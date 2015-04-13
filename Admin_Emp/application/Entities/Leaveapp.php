<?php
namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * Leaveapp
 *
 * @Table(name="leaveapp")
 * @Entity
 */
class Leaveapp
{
    /**
     * @var integer $leavid
     *
     * @Column(name="leavID", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $leavid;

    /**
     * @var string $leavdesc
     *
     * @Column(name="leavDesc", type="string", length=200, nullable=false)
     */
    private $leavdesc;

    /**
     * @var \DateTime $fromdate
     *
     * @Column(name="fromDate", type="string", length=15, nullable=false)
     */
    private $fromdate;

    /**
     * @var \DateTime $todate
     *
     * @Column(name="toDate", type="string", length=15, nullable=false)
     */
    private $todate;

    /**
     * @var integer $status
     *
     * @Column(name="status", type="integer", nullable=true)
     */
    private $status;

    /**
     * @var Empdetails
     *
     * @ManyToOne(targetEntity="Empdetails")
     * @JoinColumns({
     *   @JoinColumn(name="userApproved", referencedColumnName="usrName")
     * })
     */
    private $userapproved;

    /**
     * @var userapplied
     *
     * @ManyToOne(targetEntity="Empdetails")
     * @JoinColumns({
     *   @JoinColumn(name="userApplied", referencedColumnName="usrName")
     * })
     */
    private $userapplied;


    /**
     * Get leavid
     *
     * @return integer 
     */
    public function getLeavid()
    {
        return $this->leavid;
    }

    /**
     * Set leavdesc
     *
     * @param string $leavdesc
     * @return Leaveapp
     */
    public function setLeavdesc($leavdesc)
    {
        $this->leavdesc = $leavdesc;
        return $this;
    }

    /**
     * Get leavdesc
     *
     * @return string 
     */
    public function getLeavdesc()
    {
        return $this->leavdesc;
    }

    /**
     * Set fromdate
     *
     * @param \DateTime $fromdate
     * @return Leaveapp
     */
    public function setFromdate($fromdate)
    {
        $this->fromdate = $fromdate;
        return $this;
    }

    /**
     * Get fromdate
     *
     * @return \DateTime 
     */
    public function getFromdate()
    {
        return $this->fromdate;
    }

    /**
     * Set todate
     *
     * @param \DateTime $todate
     * @return Leaveapp
     */
    public function setTodate($todate)
    {
        $this->todate = $todate;
        return $this;
    }

    /**
     * Get todate
     *
     * @return \DateTime 
     */
    public function getTodate()
    {
        return $this->todate;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Leaveapp
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set userapproved
     *
     * @param Empdetails $userapproved
     * @return Leaveapp
     */
    public function setUserapproved(\Empdetails $userapproved = null)
    {
        $this->userapproved = $userapproved;
        return $this;
    }

    /**
     * Get userapproved
     *
     * @return Empdetails 
     */
    public function getUserapproved()
    {
        return $this->userapproved;
    }

    /**
     * Set userapplied
     *
     * @param Empdetails $userapplied
     * @return Leaveapp
     */
    public function setUserapplied(\Empdetails $userapplied = null)
    {
        $this->userapplied = $userapplied;
        return $this;
    }

    /**
     * Get userapplied
     *
     * @return Empdetails 
     */
    public function getUserapplied()
    {
        return $this->userapplied;
    }
}
