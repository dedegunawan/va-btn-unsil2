<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/10/19
 * Time: 3:41 PM
 */

require_once '../../vendor/autoload.php';

\DedeGunawan\VaBtnUnsil2\Services\Api::setId('UNSILWS');
\DedeGunawan\VaBtnUnsil2\Services\Api::setKey('LyaBszCiQclKTV90ss7M8HPcJK1gktGH');
\DedeGunawan\VaBtnUnsil2\Services\Api::setSecret('7CS17vp2gf');
\DedeGunawan\VaBtnUnsil2\Services\Api::setApiUrl('https://vabtn-dev.btn.co.id:9021/v1/unsil/');
\DedeGunawan\VaBtnUnsil2\Services\Api::setDebug(0);

try {
    $va = \DedeGunawan\VaBtnUnsil2\Entities\VaNumberEntity::build('9333300100000000001');
    $request = \DedeGunawan\VaBtnUnsil2\Requests\InquiryRequest::build([
        'ref' => \DedeGunawan\VaBtnUnsil2\Services\RefGenerator::generate(),
        'va' => (string) $va
    ]);

    \DedeGunawan\VaBtnUnsil2\VaBtnUnsil2::getInstance()->inquiry($request);

    $response = \DedeGunawan\VaBtnUnsil2\VaBtnUnsil2::getInstance()->getResponse();

    var_dump($response);



} catch (Exception $exception) {
    echo PHP_EOL;
    echo "Exception was calling from line ".$exception->getLine()." at file ".$exception->getFile().PHP_EOL;
    echo "Message is ".$exception->getMessage().PHP_EOL;
}