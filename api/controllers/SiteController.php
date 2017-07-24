<?php
namespace api\controllers;

/*
     *
      ******       ******
    **********   **********
  ************* *************
 *****************************
 *****************************
 *****************************
  ***************************
    ***********************
      ********龙龙********
        *******我*******
          *****爱*****
            ***你***
              ***
               *
     */


use common\models\Member;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use api\models\PasswordResetRequestForm;
use api\models\ResetPasswordForm;
use api\models\SignupForm;
use common\models\MessageCode;



/**
 * Site controller
 */
class SiteController extends ApiController
{
    //public $enableCsrfValidation =false;

    /**
     * @return array
     */
    public function actionLogin()
    {
        $model = new Member();
        $a =  file_get_contents('php://input', 'r');
        $b = json_decode($a,true);
        if ($model->login($b)) {
            return $this->jsonReturn(1, 'success');
        }
        return $this->jsonReturn($model->getFirstError('code'), $model->getFirstError('message'));
    }

    public function actionSignup()
    {
        $model = new SignupForm();

        if ($model->signup(Yii::$app->request->post())) {
            return $this->jsonReturn(1, 'success');
        }
        return $this->jsonReturn(0, $model->getFirstError('message'));
    }

    public function loginAfter()
    {
        //1 保存当前登录用户到session
        $mem = [
            'member' => [ 'id'=> 1, 'username' => '12345', 'mobile'=> '123456'],
            'sites' => ['site_name'=> '云乐行车', 'version'=> '1.0', 'adminEmail'=> 'a@a.com']
        ];
        Yii::$app->session->set('mem',$mem);

    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /*
     * 短信验证码
     */
    public function actionSmsCode()
    {
        $model = new MessageCode();

        //TODO:生成第一个token,第一步存电话号
        if ($model->sms(Yii::$app->request->post('username'))) {
            return $this->jsonReturn(1, 'success');
        }
        return $this->jsonReturn(0, $model->getFirstError('message'));
    }

//    public function actionError()
//    {
//        echo 1;die;
//    }

}
