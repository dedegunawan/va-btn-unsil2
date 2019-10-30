<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/10/19
 * Time: 5:37 PM
 */

namespace DedeGunawan\VaBtnUnsil2\Entities;


use DedeGunawan\UtilityClass\BaseEntity;

class VaNumberEntity extends BaseEntity
{
    protected $prefix;
    protected $kode_institusi;
    protected $kode_payment;
    protected $customer_number;

    public static function build($datas)
    {
        if (is_array($datas)) {
            $datas = self::validator($datas);
        } else {
            $string = $datas;
            if (strlen($string)>19) throw new \Exception("Maksimal VA 19 karakter");
            $datas = [
                'prefix' => substr($string, 0, 1),
                'kode_institusi' => substr($string, 1, 4),
                'kode_payment' => substr($string, 5, 3),
                'customer_number' => substr($string, 8),
            ];
        }

        return parent::build($datas); // TODO: Change the autogenerated stub
    }

    public static function validator($datas)
    {
        $prefix = @$datas['prefix'];
        if (strlen($prefix) != 1) throw new \Exception("Prefix VA tidak valid, panjang karakter harus 1 karakter");

        $kode_institusi = @$datas['kode_institusi'];
        if (strlen($kode_institusi) != 4) throw new \Exception("Kode Institusi VA tidak valid, panjang karakter harus 4 karakter");


        $kode_payment = @$datas['kode_payment'];
        if (strlen($kode_payment) > 3) throw new \Exception("Kode Payment VA tidak valid, panjang karakter maksimal 3 karakter");
        $datas['kode_payment'] = str_pad(@$datas['kode_payment'], 3, '0', STR_PAD_LEFT);

        $customer_number = @$datas['customer_number'];
        if (strlen($customer_number) > 11) throw new \Exception("Customer Number VA tidak valid, panjang karakter maksimal 10 karakter");
        $datas['customer_number'] = str_pad(@$datas['customer_number'], 11, '0', STR_PAD_LEFT);

        return $datas;
    }

    public function __toString()
    {
        try {
            $validator = self::validator($this->toArray());
            return $validator['prefix'].$validator['kode_institusi']
                .$validator['kode_payment'].$validator['customer_number'];
        } catch (\Exception $exception) {
            return '';
        }
    }


    /**
     * @return mixed
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @param mixed $prefix
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }

    /**
     * @return mixed
     */
    public function getKodeInstitusi()
    {
        return $this->kode_institusi;
    }

    /**
     * @param mixed $kode_institusi
     */
    public function setKodeInstitusi($kode_institusi)
    {
        $this->kode_institusi = $kode_institusi;
    }

    /**
     * @return mixed
     */
    public function getKodePayment()
    {
        return $this->kode_payment;
    }

    /**
     * @param mixed $kode_payment
     */
    public function setKodePayment($kode_payment)
    {
        $this->kode_payment = $kode_payment;
    }

    /**
     * @return mixed
     */
    public function getCustomerNumber()
    {
        return $this->customer_number;
    }

    /**
     * @param mixed $customer_number
     */
    public function setCustomerNumber($customer_number)
    {
        $this->customer_number = $customer_number;
    }


}