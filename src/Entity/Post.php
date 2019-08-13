<?php

namespace App\Entity;

// use Doctrine\Common\Collections\ArrayCollection;
// use Doctrine\Common\Collections\Collection;
use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="posts")
 */
class Post {
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @var string
     *
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $postdate;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="userid", referencedColumnName="id")
     */
    private $user;

    public function __construct()
    {
        $this->postdate = new \DateTime();
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getPostdate(): ?\DateTime
    {
        return $this->postdate;
    }

    public function setPostdate(\DateTime $content): void
    {
        $this->postdate = $postdate;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /*
    public function getUserid(): ?int
    {
        return $this->userid;
    }

    public function setUserid(int $userid): void
    {
        $this->userid = $userid;
    }
    
    // == Test ==
    /*
    public static function getMockPosts() {
        $mocks = [new Post(), new Post()];
        $mocks[0]->setContent("toto");
        $mocks[1]->setContent("ό͔茕뻤넫ߒΜػʭࠔ즾񍂐Ɣ⇨ڑ");
        return $mocks;
    }
    */

}

?>
