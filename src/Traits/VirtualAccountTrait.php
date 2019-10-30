<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/10/19
 * Time: 11:03 AM
 */

namespace DedeGunawan\VaBtnUnsil2\Traits;


trait VirtualAccountTrait
{
    protected $ref;
    protected $va;
    protected $nama;
    protected $layanan;
    protected $kodelayanan;
    protected $jenisbayar;
    protected $kodejenisbyr;
    protected $noid;
    protected $tagihan;
    protected $flag;
    protected $expired;
    protected $reserve;
    protected $description;
    protected $terbayar;
    protected $createdate;
    protected $createtime;
    protected $angkatan;


    /**
     * @return mixed
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @param mixed $ref
     */
    public function setRef($ref)
    {
        $this->ref = $ref;
    }



    /**
     * @return mixed
     */
    public function getVa()
    {
        return $this->va;
    }

    /**
     * @param mixed $va
     */
    public function setVa($va)
    {
        $this->va = $va;
    }



    /**
     * @return mixed
     */
    public function getNama()
    {
        return $this->nama;
    }

    /**
     * @param mixed $nama
     */
    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    /**
     * @return mixed
     */
    public function getLayanan()
    {
        return $this->layanan;
    }

    /**
     * @param mixed $layanan
     */
    public function setLayanan($layanan)
    {
        $this->layanan = $layanan;
    }

    /**
     * @return mixed
     */
    public function getKodelayanan()
    {
        return $this->kodelayanan;
    }

    /**
     * @param mixed $kodelayanan
     */
    public function setKodelayanan($kodelayanan)
    {
        $this->kodelayanan = $kodelayanan;
    }

    /**
     * @return mixed
     */
    public function getJenisbayar()
    {
        return $this->jenisbayar;
    }

    /**
     * @param mixed $jenisbayar
     */
    public function setJenisbayar($jenisbayar)
    {
        $this->jenisbayar = $jenisbayar;
    }

    /**
     * @return mixed
     */
    public function getKodejenisbyr()
    {
        return $this->kodejenisbyr;
    }

    /**
     * @param mixed $kodejenisbyr
     */
    public function setKodejenisbyr($kodejenisbyr)
    {
        $this->kodejenisbyr = $kodejenisbyr;
    }

    /**
     * @return mixed
     */
    public function getNoid()
    {
        return $this->noid;
    }

    /**
     * @param mixed $noid
     */
    public function setNoid($noid)
    {
        $this->noid = $noid;
    }

    /**
     * @return mixed
     */
    public function getTagihan()
    {
        return $this->tagihan;
    }

    /**
     * @param mixed $tagihan
     */
    public function setTagihan($tagihan)
    {
        $this->tagihan = $tagihan;
    }

    /**
     * @return mixed
     */
    public function getFlag()
    {
        return $this->flag;
    }

    /**
     * @param mixed $flag
     */
    public function setFlag($flag)
    {
        $this->flag = $flag;
    }

    /**
     * @return mixed
     */
    public function getExpired()
    {
        return $this->expired;
    }

    /**
     * @param mixed $expired
     */
    public function setExpired($expired)
    {
        $this->expired = $expired;
    }

    /**
     * @return mixed
     */
    public function getReserve()
    {
        return $this->reserve;
    }

    /**
     * @param mixed $reserve
     */
    public function setReserve($reserve)
    {
        $this->reserve = $reserve;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getTerbayar()
    {
        return $this->terbayar;
    }

    /**
     * @param mixed $terbayar
     */
    public function setTerbayar($terbayar)
    {
        $this->terbayar = $terbayar;
    }

    /**
     * @return mixed
     */
    public function getCreatedate()
    {
        return $this->createdate;
    }

    /**
     * @param mixed $createdate
     */
    public function setCreatedate($createdate)
    {
        $this->createdate = $createdate;
    }

    /**
     * @return mixed
     */
    public function getCreatetime()
    {
        return $this->createtime;
    }

    /**
     * @param mixed $createtime
     */
    public function setCreatetime($createtime)
    {
        $this->createtime = $createtime;
    }

    /**
     * @return mixed
     */
    public function getAngkatan()
    {
        return $this->angkatan;
    }

    /**
     * @param mixed $angkatan
     */
    public function setAngkatan($angkatan)
    {
        $this->angkatan = $angkatan;
    }

}