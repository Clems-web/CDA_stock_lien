<?php

namespace Cleme\CdaStockLien\Model\Entity;

class User {

    private ?int $id;
    private ?string $nom;
    private ?string $prenom;
    private ?string $mail;
    private ?string $pass;


    /**
     * @param int|null $id
     * @param string $nom
     * @param string $prenom
     * @param string $mail
     * @param string $pass
     */
    public function __construct(?int $id, string $nom, string $prenom, string $mail, string $pass) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->pass = $pass;
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
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * @param string|null $nom
     */
    public function setNom(?string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string|null
     */
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    /**
     * @param string|null $prenom
     */
    public function setPrenom(?string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string|null
     */
    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * @param string|null $mail
     */
    public function setMail(?string $mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @return string|null
     */
    public function getPass(): ?string
    {
        return $this->pass;
    }

    /**
     * @param string|null $pass
     */
    public function setPass(?string $pass): void
    {
        $this->pass = $pass;
    }


}