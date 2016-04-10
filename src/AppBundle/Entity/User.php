<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/** @noinspection ClassOverridesFieldOfSuperClassInspection
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 * @ORM\HasLifecycleCallbacks
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="interests", type="array", nullable=TRUE)
     *
     * @var array
     */
    protected $interests;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $created_at;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    protected $updated_at;

    public function __construct()
    {
        parent::__construct();
        $this->interests = array();
        $this->created_at = $this->updated_at = new \DateTime('now');
    }

    /** @ORM\PreUpdate */
    public function updated()
    {
        $this->updated_at = new \DateTime('now');
    }

    public function setEmail($email)
    {
        parent::setEmail($email);
        $this->setUsername($email);

        return $this;
    }

    public function setInterests(array $interests)
    {
        $this->interests = array();

        foreach ($interests as $interest) {
            $this->addInterest($interest);
        }

        return $this;
    }

    public function addInterest($interest)
    {
        if (!in_array($interest, $this->interests, true)) {
            $this->interests[] = $interest;
        }

        return $this;
    }

    /**
     * Returns the user interests
     *
     * @return array The interests
     */
    public function getInterests()
    {
        //usort($this->interests, array($this,'sortByName'));
        return $this->interests;
    }

    /**
     * @param string $interest
     *
     * @return boolean
     */
    public function hasInterest($interest)
    {
        return in_array($interest, $this->getInterests(), true);
    }

    public function removeInterest($interest)
    {
        if (false !== $key = array_search($interest, $this->interests, true)) {
            unset($this->interests[$key]);
            $this->interests = array_values($this->interests);
        }

        return $this;
    }

    protected function sortByName(array $a, array $b)
    {
        //return strcmp($a->getName(), $b->getName());
    }
}