<?php

namespace ZeCashDeskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tickets
 *
 * @ORM\Table(name="tickets")
 * @ORM\Entity(repositoryClass="ZeCashDeskBundle\Repository\TicketsRepository")
 */
class Tickets
{
    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     */
    private $users;


    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="num_ticket", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $numTicket;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return \UserBundle\Entity\User
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param \UserBundle\Entity\User $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }

    /**
     * @return int
     */
    public function getNumTicket(): int
    {
        return $this->numTicket;
    }

    /**
     * @param int $numTicket
     */
    public function setNumTicket(int $numTicket)
    {
        $this->numTicket = $numTicket;
    }



}

