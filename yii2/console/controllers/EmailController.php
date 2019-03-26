<?

namespace console\controllers;

use backend\models\Task;
use Yii;
use yii\console\controller;

class EmailController extends Controller
{

    private $subject = 'У вас на подходе не выполненные задачи.';
    private $name = 'Администратор';
    public $clock = null;

    public function options($actionID)
    {
        return ['clock'];
    }

    public function optionAliases()
    {
        return ['c' => 'clock'];
    }

    public function actionIndex()
    {

        if ($this->clock === null || $this->clock < 0 || !is_int($this->clock)){
            $this->clock = 3;
        }
        $time = time() +  60*60*$this->clock;
        $date =  date('Y-m-d H:i:s');
        $date2 = date('Y-m-d H:i:s',$time);
        $newTasks = Task::find()->asArray()->where(['between', 'date_end', $date, $date2])
            ->with('user')->all();
        Task::deleteAll(['<','date_end',$date]);
        if (!empty($newTasks)) {
//            Yii::$app->twilio->sms('+375298096531', 'У Вас есть не выполненные задачи.',[
//                'from' => '+12028049472' ]);
            Yii::$app->mailer->compose(
                [
                    'html' => 'task-html'
                ],
                [
                    'title' => $this->subject,
                    'description' => $newTasks,
                    'name' => $this->name,
                    'email' => Yii::$app->params['adminEmail']
                ]
            )->setTo(Yii::$app->params['adminEmail'])
                ->setFrom([Yii::$app->params['adminEmail'] => $this->name])
                ->setSubject($this->subject)
                ->setTextBody('Для просмотра задач перейдите в управление сайтом.')
                ->send();
            echo 'Количество не выполненных задач: '.count($newTasks);
        } else {
            echo 'На данные момент, задач нет.';
        }

        return 0;
    }
}