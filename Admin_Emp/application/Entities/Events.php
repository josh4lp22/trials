<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Events
 *
 * @Table(name="events")
 * @Entity
 */
class Events
{
    /**
     * @var integer $eventid
     *
     * @Column(name="eventID", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $eventid;

    /**
     * @var string $eventname
     *
     * @Column(name="eventName", type="string", length=40, nullable=false)
     */
    private $eventname;

    /**
     * @var \DateTime $eventdate
     *
     * @Column(name="eventDate", type="string", length=15, nullable=false)
     */
    private $eventdate;


    /**
     * Get eventid
     *
     * @return integer 
     */
    public function getEventid()
    {
        return $this->eventid;
    }

    /**
     * Set eventname
     *
     * @param string $eventname
     * @return Events
     */
    public function setEventname($eventname)
    {
        $this->eventname = $eventname;
        return $this;
    }

    /**
     * Get eventname
     *
     * @return string 
     */
    public function getEventname()
    {
        return $this->eventname;
    }

    /**
     * Set eventdate
     *
     * @param \DateTime $eventdate
     * @return Events
     */
    public function setEventdate($eventdate)
    {
        $this->eventdate = $eventdate;
        return $this;
    }

    /**
     * Get eventdate
     *
     * @return \DateTime 
     */
    public function getEventdate()
    {
        return $this->eventdate;
    }
}
