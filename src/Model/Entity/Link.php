<?php

namespace Cleme\CdaStockLien\Model\Entity;

class Link {

    private ?int $id;
    private ?string $href;
    private ?string $title;
    private ?string $target;
    private ?string $name;
    private ?int $user_fk;
    private ?int $clickNumber;


    /**
     * Link constructor
     * @param int|null $id
     * @param string $href
     * @param string $title
     * @param string $target
     * @param string $name
     * @param int $user_fk
     * @param int $clickNumber
     */

    public function __construct(?int $id, string $href, string $title, string $target, string $name, int $user_fk, int $clickNumber) {
        $this->id = $id;
        $this->href = $href;
        $this->title = $title;
        $this->target = $target;
        $this->name = $name;
        $this->user_fk = $user_fk;
        $this->clickNumber = $clickNumber;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getHref(): ?string
    {
        return $this->href;
    }

    /**
     * @param string|null $href
     */
    public function setHref(?string $href): void
    {
        $this->href = $href;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getTarget(): ?string
    {
        return $this->target;
    }

    /**
     * @param string|null $target
     */
    public function setTarget(?string $target): void
    {
        $this->target = $target;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int|null
     */
    public function getUserFk(): ?int
    {
        return $this->user_fk;
    }

    /**
     * @param int|null $user_fk
     */
    public function setUserFk(?int $user_fk): void
    {
        $this->user_fk = $user_fk;
    }

    /**
     * @return int|null
     */
    public function getClickNumber(): ?int
    {
        return $this->clickNumber;
    }

    /**
     * @param int|null $clickNumber
     */
    public function setClickNumber(?int $clickNumber): void
    {
        $this->clickNumber = $clickNumber;
    }




}