<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace pd\coloradmin\widgets;

use yii\bootstrap\Alert as BootstrapAlert;
use yii\bootstrap\Widget;

/**
 * Alert widget renders a message from session flash for AdminLTE alerts. All flash messages are displayed
 * in the sequence they were assigned using setFlash. You can set message as following:
 *
 * ```php
 * \Yii::$app->getSession()->setFlash('error', '<b>Alert!</b> Danger alert preview. This alert is dismissable.');
 * ```
 *
 * Multiple messages could be set as follows:
 *
 * ```php
 * \Yii::$app->getSession()->setFlash('error', ['Error 1', 'Error 2']);
 * ```
 *
 * @author Evgeniy Tkachenko <et.coder@gmail.com>
 */
class Alert extends Widget
{
    /**
     * @var array the alert types configuration for the flash messages.
     * This array is setup as $key => $value, where:
     * - $key is the name of the session flash variable
     * - $value is the array:
     *       - class of alert type (i.e. danger, success, info, warning)
     *       - icon for icon <i class="fa fa-warning"></i>
     */
    public $alertTypes = [
        'error' => [
            'class' => 'alert-danger fade in m-b-15',
            'icon' => '<i class=""></i>',
        ],
        'danger' => [
            'class' => 'alert-danger fade in m-b-15',
            'icon' => '<i class=""></i>',
        ],
        'success' => [
            'class' => 'alert-success fade in m-b-15',
            'icon' => '<i class=""></i>',
        ],
        'info' => [
            'class' => 'alert-info fade in m-b-15',
            'icon' => '<i class=""></i>',
        ],
        'warning' => [
            'class' => 'alert-warning fade in m-b-15',
            'icon' => '<i class=""></i>',
        ],
    ];

    /**
     * @var array the options for rendering the close button tag.
     */
    public $closeButton = [];


    /**
     * @var boolean whether to removed flash messages during AJAX requests
     */
    public $isAjaxRemoveFlash = true;
    
    /**
     * Initializes the widget.
     * This method will register the bootstrap asset bundle. If you override this method,
     * make sure you call the parent implementation first.
     */
    public function init()
    {
        parent::init();

        $session = \Yii::$app->getSession();
        $flashes = $session->getAllFlashes();
        $appendCss = isset($this->options['class']) ? ' ' . $this->options['class'] : '';

        foreach ($flashes as $type => $data) {
            if (isset($this->alertTypes[$type])) {
                $data = (array) $data;
                foreach ($data as $message) {

                    $this->options['class'] = $this->alertTypes[$type]['class'] . $appendCss;
                    $this->options['id'] = $this->getId() . '-' . $type;

                    echo BootstrapAlert::widget([
                            'body' => $this->alertTypes[$type]['icon'] . $message,
                            'closeButton' => $this->closeButton,
                            'options' => $this->options,
                        ]);
                }
                if ($this->isAjaxRemoveFlash && !\Yii::$app->request->isAjax) {
                    $session->removeFlash($type);
                }
            }
        }
    }
}
