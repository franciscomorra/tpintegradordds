<?php

/**
 * @Entity @Table(name="festivales")
 **/
class Festival
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id_festival;
    /** @Column(type="string") **/
    protected $nombre;

    /**
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id_festival = $id;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id_festival;
    }

}

