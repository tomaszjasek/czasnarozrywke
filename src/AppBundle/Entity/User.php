<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */

/** @noinspection ClassOverridesFieldOfSuperClassInspection */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="disciplines", type="array")
     *
     * @var array
     */
    protected $disciplines;

    public function __construct()
    {
        parent::__construct();

        $this->disciplines = array();
    }

    public function setDisciplines(array $disciplines)
    {
        $this->disciplines = array();

        foreach ($disciplines as $discipline) {
            $this->addDiscipline($discipline);
        }

        return $this;
    }

    public function addDiscipline($discipline)
    {
        if (!in_array($discipline, $this->disciplines, true)) {
            $this->disciplines[] = $discipline;
        }

        return $this;
    }

    /**
     * Returns the user disciplines
     *
     * @return array The disciplines
     */
    public function getDisciplines()
    {
        return $this->disciplines;
    }

    /**
     * @param string $discipline
     *
     * @return boolean
     */
    public function hasDiscipline($discipline)
    {
        return in_array($discipline, $this->getDisciplines(), true);
    }

    public function removeDiscipline($discipline)
    {
        if (false !== $key = array_search($discipline, $this->disciplines, true)) {
            unset($this->disciplines[$key]);
            $this->disciplines = array_values($this->disciplines);
        }

        return $this;
    }
}