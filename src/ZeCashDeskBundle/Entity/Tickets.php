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

<<<<<<< HEAD
    /**
     * @var int
     *
     * @ORM\Column(name="num_ticket", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $numTicket;
=======
	/**
	 * @var int
	 *
	 * @ORM\Column(name="num_ticket", type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $numTicket;

>>>>>>> Gestion_variables_ticket

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

<<<<<<< HEAD
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
=======
	/**
	 * @return int
	 */
	public function getNumTicket(): int {
		return $this->numTicket;
	}

	/**
	 * @param int $numTicket
	 * @return Tickets
	 */
	public function setNumTicket( int $numTicket ) {
		$this->numTicket = $numTicket;
	}
>>>>>>> Gestion_variables_ticket



}

