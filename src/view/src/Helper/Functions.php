<?php
declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

if (!function_exists('view')) {

    /**
     * @param string $template
     * @param array $data
     * @param string|null $layout
     *
     * @return \Swoft\Http\Message\Server\Response
     */
    function view(string $template, array $data = [], $layout = null)
    {
        /**
         * @var \Swoft\View\Base\View               $view
         * @var \Swoft\Http\Message\Server\Response $response
         */
        $view     = \Swoft\App::getBean('view');
        $response = \Swoft\Core\RequestContext::getResponse();

        $content  = $view->render(\alias($template), $data, $layout);
        $response = $response->withContent($content)->withoutHeader('Content-Type')->withAddedHeader('Content-Type', 'text/html');

        return $response;
    }
}
