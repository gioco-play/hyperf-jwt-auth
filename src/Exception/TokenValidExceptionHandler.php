<?php
/**
 * Created by PhpStorm.
 * User: liyuzhao
 * Date: 2019-08-01
 * Time: 13:43
 */

namespace GiocoPlus\JWTAuth\Exception;

use GiocoPlus\JWTAuth\Exception\TokenValidException;
use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class TokenValidExceptionHandler extends ExceptionHandler
{
    /**
     * @var StdoutLoggerInterface
     */
    protected $logger;

    public function __construct(StdoutLoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        // 格式化输出
        $data = json_encode([
            'status' => 0,
            'message' => 'JWT Auth Fail'
        ]);
        // 阻止异常冒泡
        $this->stopPropagation();
        return $response->withStatus(401)->withHeader('Content-Type', 'application/json')->withBody(new SwooleStream($data));
    }

    public function isValid(Throwable $throwable): bool
    {
        return $throwable instanceof TokenValidException;
    }
}
