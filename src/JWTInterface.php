<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: liyuzhao
 * Date: 2020/4/21
 * Time: 1:34 下午
 */

namespace GiocoPlus\JWTAuth;

/**
 * Interface JWTInterface
 * @package GiocoPlus\JWTAuth
 */
interface JWTInterface
{
    public function setSceneConfig(string $scene = 'default', $value = null);
    public function getSceneConfig(string $scene = 'default');
    public function setScene(string $scene);
    public function getScene();
}
